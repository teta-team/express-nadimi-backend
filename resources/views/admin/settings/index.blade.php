@extends('admin.layouts.app')

@section('title', 'تنظیمات')
@section('page-title', 'تنظیمات حساب')
@section('page-subtitle', 'نام، نام کاربری و گذرواژه‌ی مدیر را تغییر دهید')

@section('content')
    <div class="card" style="max-width:720px">
        <div class="card-h"><b>اطلاعات حساب مدیر</b></div>

        <form method="POST" action="{{ route('admin.settings.update') }}">
            @csrf

            <div class="form-grid">
                <div class="field">
                    <label for="s-name">نام</label>
                    <input id="s-name" name="name" value="{{ old('name', $user->name) }}" required maxlength="255">
                </div>

                <div class="field">
                    <label for="s-username">نام کاربری</label>
                    <input id="s-username" name="username" value="{{ old('username', $user->username) }}" required
                           minlength="3" maxlength="50" dir="ltr" autocomplete="username">
                </div>

                <div class="field w">
                    <label for="s-current">گذرواژه‌ی فعلی</label>
                    <input id="s-current" type="password" name="current_password" required autocomplete="current-password" dir="ltr">
                </div>

                <div class="field">
                    <label for="s-password">گذرواژه‌ی جدید <span style="color:#9aa3b9">(اختیاری)</span></label>
                    <input id="s-password" type="password" name="password" minlength="8" autocomplete="new-password" dir="ltr">
                </div>

                <div class="field">
                    <label for="s-password-confirm">تکرار گذرواژه‌ی جدید</label>
                    <input id="s-password-confirm" type="password" name="password_confirmation" minlength="8" autocomplete="new-password" dir="ltr">
                </div>
            </div>

            <div class="actions">
                <button class="btn p" type="submit">ذخیره تغییرات</button>
            </div>
        </form>
    </div>
@endsection