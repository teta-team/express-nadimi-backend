<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Throwable;

/**
 * Native GD based image processor.
 *
 * Resizes uploaded images to a sensible maximum size and stores them on the
 * public disk. Requires the PHP GD extension only (no external package).
 */
class ImageProcessor
{
    public const DEFAULT_MAX_WIDTH = 1600;

    public const DEFAULT_MAX_HEIGHT = 1600;

    public const DEFAULT_QUALITY = 82;

    public function __construct(
        protected string $directory = 'products',
        protected int $maxWidth = self::DEFAULT_MAX_WIDTH,
        protected int $maxHeight = self::DEFAULT_MAX_HEIGHT,
        protected int $quality = self::DEFAULT_QUALITY,
    ) {}

    /**
     * Store an uploaded image, resize it when needed, and return a public URL.
     */
    public function storeImage(UploadedFile $file): ?string
    {
        if (! $file->isValid()) {
            return null;
        }

        try {
            $extension = strtolower($file->getClientOriginalExtension() ?: 'jpg');

            return $this->storeBinary((string) file_get_contents($file->getRealPath()), $extension);
        } catch (Throwable) {
            return null;
        }
    }

    /**
     * Store an image coming from the JSON API as a base64 data URL.
     */
    public function storeDataUrl(string $dataUrl): ?string
    {
        if (! preg_match('/^data:image\/[a-zA-Z0-9.+-]+;base64,/', $dataUrl)) {
            return null;
        }

        $payload = preg_replace('/^data:image\/[a-zA-Z0-9.+-]+;base64,/', '', $dataUrl);
        $payload = str_replace(' ', '+', (string) $payload);
        $binary = base64_decode($payload, true);

        if ($binary === false || $binary === '') {
            return null;
        }

        return $this->storeBinary($binary, 'jpg');
    }

    /**
     * Remove a previously stored image given its public URL or relative path.
     */
    public function deleteImage(?string $url): void
    {
        if (! $url) {
            return;
        }

        $path = $url;

        if (Str::startsWith($path, ['http://', 'https://'])) {
            $parsed = parse_url($path, PHP_URL_PATH) ?: '';
            $path = ltrim($parsed, '/');
        }

        $path = preg_replace('#^storage/#', '', $path) ?? $path;
        $path = ltrim($path, '/');

        if ($path === '') {
            return;
        }

        Storage::disk('public')->delete($path);
    }

    protected function storeBinary(string $binary, string $extension): ?string
    {
        $image = @imagecreatefromstring($binary);

        if ($image === false) {
            return null;
        }

        $width = imagesx($image);
        $height = imagesy($image);

        if ($width < 1 || $height < 1) {
            imagedestroy($image);

            return null;
        }

        [$targetWidth, $targetHeight] = $this->fitDimensions($width, $height);

        if ($targetWidth !== $width || $targetHeight !== $height) {
            $resized = imagecreatetruecolor($targetWidth, $targetHeight);

            if (in_array($extension, ['png', 'webp', 'gif'], true)) {
                imagealphablending($resized, false);
                imagesavealpha($resized, true);
                $transparent = imagecolorallocatealpha($resized, 255, 255, 255, 127);
                imagefilledrectangle($resized, 0, 0, $targetWidth, $targetHeight, $transparent);
            }

            imagecopyresampled(
                $resized,
                $image,
                0,
                0,
                0,
                0,
                $targetWidth,
                $targetHeight,
                $width,
                $height
            );

            imagedestroy($image);
            $image = $resized;
        }

        $isPng = in_array($extension, ['png', 'webp', 'gif'], true);
        $filename = Str::uuid()->toString().($isPng ? '.png' : '.jpg');
        $relative = trim($this->directory, '/').'/'.$filename;
        $absolute = Storage::disk('public')->path($relative);

        if (! is_dir(dirname($absolute))) {
            mkdir(dirname($absolute), 0755, true);
        }

        $saved = $isPng
            ? imagepng($image, $absolute, 6)
            : imagejpeg($image, $absolute, $this->quality);

        imagedestroy($image);

        if (! $saved) {
            return null;
        }

        return asset('storage/'.$relative);
    }

    /**
     * @return array{0:int,1:int}
     */
    protected function fitDimensions(int $width, int $height): array
    {
        if ($width <= $this->maxWidth && $height <= $this->maxHeight) {
            return [$width, $height];
        }

        $ratio = min($this->maxWidth / $width, $this->maxHeight / $height);

        return [max(1, (int) round($width * $ratio)), max(1, (int) round($height * $ratio))];
    }
}
