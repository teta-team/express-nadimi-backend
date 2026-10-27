<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable()->unique()->after('name');
            $table->boolean('is_superuser')->default(false)->after('password');
            // The panel logs in with a username, so email is no longer required.
            $table->string('email')->nullable()->change();
        });

        // Default super user: admin / admin.
        // Change it from the panel (Settings tab) after the first login.
        if (! DB::table('users')->where('username', 'admin')->exists()) {
            DB::table('users')->insert([
                'name' => 'Admin',
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'is_superuser' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('users')->where('username', 'admin')->delete();

        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['username']);
            $table->dropColumn(['username', 'is_superuser']);
        });
    }
};
