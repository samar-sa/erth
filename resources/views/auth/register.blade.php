@extends('layouts.app')

@section('content')
<div style="padding: 60px 20px; background-color: #FDFBF7; min-height: 100vh; direction: rtl; font-family: 'Segoe UI', sans-serif;">
    <div style="max-width: 450px; margin: 0 auto; background: white; padding: 40px; border-radius: 20px; border: 1px solid #E0D5C1; box-shadow: 0 10px 30px rgba(93,64,55,0.05);">
        
        <div style="text-align: center; margin-bottom: 30px;">
            <h2 style="color: #5D4037; font-weight: 800;">إنشاء حساب جديد</h2>
        </div>

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 8px; color: #5D4037; font-weight: bold;">الاسم الكامل:</label>
                <input type="text" name="name" style="width: 100%; padding: 12px; border: 1px solid #E0D5C1; border-radius: 10px; outline: none;" required>
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 8px; color: #5D4037; font-weight: bold;">البريد الإلكتروني:</label>
                <input type="email" name="email" style="width: 100%; padding: 12px; border: 1px solid #E0D5C1; border-radius: 10px; outline: none;" required>
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 8px; color: #5D4037; font-weight: bold;">كلمة المرور:</label>
                <input type="password" name="password" style="width: 100%; padding: 12px; border: 1px solid #E0D5C1; border-radius: 10px; outline: none;" required>
            </div>

            <div style="margin-bottom: 25px;">
                <label style="display: block; margin-bottom: 8px; color: #5D4037; font-weight: bold;">تأكيد كلمة المرور:</label>
                <input type="password" name="password_confirmation" style="width: 100%; padding: 12px; border: 1px solid #E0D5C1; border-radius: 10px; outline: none;" required>
            </div>

            <button type="submit" style="width: 100%; background: #5D4037; color: white; padding: 14px; border: none; border-radius: 10px; font-weight: bold; cursor: pointer;">إنشاء الحساب</button>
        </form>
    </div>
</div>
@endsection