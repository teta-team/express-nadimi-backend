<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>ورود | اکسپرس ندیمی</title>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        @verbatim :root {
                --forest: #1e2823;
                --green: #2f6a47;
                --leaf: #3f7f58;
                --bg: #f4f5f2;
                --surface: #fff;
                --ink: #222a26;
                --muted: #6b746f;
                --line: #e4e7e2;
                --red: #b23a30;
                --solid: #2f6a47;
                --on: #fff;
                color-scheme: light
            }

            @media(prefers-color-scheme:dark) {
                :root {
                    --forest: #eef1ee;
                    --green: #9cc7a9;
                    --leaf: #7fb592;
                    --bg: #121513;
                    --surface: #1a1e1c;
                    --ink: #e6eae7;
                    --muted: #959e98;
                    --line: #2a302d;
                    --red: #f08174;
                    --solid: #8fc2a0;
                    --on: #10261a;
                    color-scheme: dark
                }
            }

            * {
                box-sizing: border-box
            }

            body {
                margin: 0;
                min-height: 100vh;
                display: grid;
                place-items: center;
                padding: 20px;
                background: var(--bg);
                color: var(--ink);
                font: 15px/1.85 Vazirmatn, Tahoma, sans-serif
            }

            .box {
                width: 100%;
                max-width: 380px;
                background: var(--surface);
                border: 1px solid var(--line);
                border-radius: 24px;
                padding: 32px 28px;
                box-shadow: 0 1px 2px rgb(30 40 35/.05), 0 14px 32px -22px rgb(30 40 35/.28)
            }

            .logo {
                display: flex;
                align-items: center;
                gap: 12px;
                margin-bottom: 24px
            }

            .logo img {
                width: 46px;
                height: 46px;
                border-radius: 13px;
                background: #fff;
                padding: 4px;
                border: 1px solid var(--line)
            }

            .logo b {
                display: block;
                font-weight: 700;
                font-size: 1.08rem;
                line-height: 1.4;
                color: var(--forest)
            }

            .logo small {
                color: var(--muted);
                font-size: .8rem
            }

            label {
                display: block;
                margin-bottom: 6px;
                font-weight: 700;
                font-size: .88rem
            }

            input {
                width: 100%;
                min-height: 48px;
                margin-bottom: 16px;
                padding: .65em .95em;
                font: inherit;
                color: var(--ink);
                background: var(--surface);
                border: 1.5px solid var(--line);
                border-radius: 12px;
                direction: ltr;
                text-align: left
            }

            input:focus {
                outline: 0;
                border-color: var(--leaf);
                box-shadow: 0 0 0 3px color-mix(in srgb, var(--leaf) 22%, transparent)
            }

            button {
                width: 100%;
                min-height: 48px;
                margin-top: 4px;
                border: 0;
                border-radius: 999px;
                background: var(--solid);
                color: var(--on);
                font: inherit;
                font-weight: 700;
                font-size: 1rem;
                cursor: pointer
            }

            button:hover {
                filter: brightness(1.08)
            }

            .err {
                margin: 0 0 16px;
                padding: 10px 16px;
                border-radius: 14px;
                font-size: .9rem;
                font-weight: 600;
                background: color-mix(in srgb, var(--red) 12%, transparent);
                color: var(--red)
            }
            @endverbatim
        </style>
    </head>

    <body>
        <form class="box" method="POST" action="">
            @csrf
            <div class="logo"><img
                    src="data:image/png;base64,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"
                    alt="">
                <div><b>اکسپرس ندیمی</b><small>پنل مدیریت</small></div>
            </div>

            @if ($errors->any())
                <p class="err" role="alert">نام کاربری یا گذرواژه درست نیست.</p>
            @endif

            <label for="username">نام کاربری</label>
            <input id="username" name="username" type="text" value="{{ old('username') }}" autocomplete="username"
                autocapitalize="none" required autofocus>

            <label for="password">گذرواژه</label>
            <input id="password" name="password" type="password" autocomplete="current-password" required>

            <button type="submit">ورود</button>
        </form>
    </body>

    </html>
