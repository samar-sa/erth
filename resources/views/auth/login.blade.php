@extends('layouts.app')

@section('content')
<div style="padding: 60px 20px; background-color: #FDFBF7; min-height: 100vh; direction: rtl; font-family: 'Segoe UI', sans-serif;">
    <div style="max-width: 400px; margin: 0 auto; background: white; padding: 40px; border-radius: 20px; border: 1px solid #E0D5C1; box-shadow: 0 10px 30px rgba(93,64,55,0.05);">
        
        <div style="text-align: center; margin-bottom: 30px;">
            <h2 style="color: #5D4037; font-weight: 800;">تسجيل الدخول</h2>
            <p style="color: #8D6E63; font-size: 14px;">مرحباً بك في سجل الآثار والمعادن</p>
        </div>

        @if($errors->any())
            <div style="background: #F8D7DA; color: #721C24; padding: 10px; border-radius: 8px; margin-bottom: 20px; font-size: 13px;">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; color: #5D4037; font-weight: bold;">البريد الإلكتروني:</label>
                <input type="email" name="email" style="width: 100%; padding: 12px; border: 1px solid #E0D5C1; border-radius: 10px; outline: none;" required>
            </div>

            <div style="margin-bottom: 25px;">
                <label style="display: block; margin-bottom: 8px; color: #5D4037; font-weight: bold;">كلمة المرور:</label>
                <input type="password" name="password" style="width: 100%; padding: 12px; border: 1px solid #E0D5C1; border-radius: 10px; outline: none;" required>
            </div>

            <button type="submit" style="width: 100%; background: #5D4037; color: white; padding: 14px; border: none; border-radius: 10px; font-weight: bold; cursor: pointer;">دخول</button>
            
            <p style="text-align: center; margin-top: 20px; font-size: 13px; color: #8D6E63;">
                ليس لديك حساب؟ <a href="{{ route('register') }}" style="color: #5D4037; font-weight: bold; text-decoration: none;">إنشاء حساب جديد</a>
            </p>
        </form>
    </div>
</div>
@endsection