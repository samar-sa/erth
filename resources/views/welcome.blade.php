@extends('layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700;900&family=Almarai:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<div class="container">
    <div class="row align-items-center" style="padding: 80px 0; min-height: 85vh; direction: rtl;">
        
        <div class="col-md-6">
            <div style="margin-bottom: 30px;">
                <span style="background: #F4EFE6; color: #D4A373; padding: 6px 20px; border-radius: 4px; font-family: 'Cairo', sans-serif; font-weight: 700; font-size: 13px; display: inline-block; margin-bottom: 25px; border-right: 3px solid #D4A373; letter-spacing: 0.5px;">
                    المنصة الوطنية للتوثيق الرقمي
                </span>
                
                <h1 class="hero-title">
                    عراقةُ الماضي..<br>
                    <span style="color: #D4A373;">برؤيةِ المستقبل</span>
                </h1>
            </div>

            <p class="hero-text">
                مرحبًا بك في منصة 
                <span class="brand-highlight">إرث</span>
                بوابتك الرقمية لاستكشاف كنوز المملكة العربية السعودية من 
                <span style="font-weight: 700; color: #D4A373;">معالم أثريةٍ خالدة</span> وثرواتٍ معدنية. 
                <br><br>
                انضم إلينا في رحلتنا لتوثيق تراثنا الوطني وحماية ذاكرة الأرض.
            </p>

            <div style="display: flex; gap: 25px; align-items: center;">
                <a href="{{ route('artifacts.index') }}" class="btn-main">ابدأ الرحلة</a>
                <a href="{{ route('about') }}" class="link-secondary">من نحن؟</a>
            </div>
        </div>

        <div class="col-md-6">
            <div class="features-layout">
                <div class="f-card bg-sand"><i class="bi bi-bank"></i><h4>المعالم الأثرية</h4></div>
                <div class="f-card bg-white shift-up"><i class="bi bi-gem"></i><h4>الثروات المعدنية</h4></div>
                <div class="f-card bg-white shift-down"><i class="bi bi-cpu"></i><h4>التوثيق الرقمي</h4></div>
                
                <div class="f-card bg-dark-custom shift-up">
                    <i class="bi bi-eye" style="color: #F4EFE6;"></i>
                    <h4 style="color: #F4EFE6;">رؤية 2030</h4>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    * { font-family: 'Almarai', sans-serif; }

    .hero-title {
        font-family: 'Cairo', sans-serif !important;
        font-weight: 900;
        color: #5D4037;
        font-size: 52px;
        line-height: 1.1;
        margin: 0;
    }

    .brand-highlight {
        font-family: 'Cairo', sans-serif !important;
        font-weight: 900;
        color: #3E2723;
        font-size: 28px;
        margin: 0 4px;
        border-bottom: 2px solid #D4A373; 
    }

    .hero-text {
        color: #8D6E63;
        font-size: 19px;
        line-height: 1.9;
        margin-bottom: 45px;
        max-width: 550px;
    }

    .btn-main {
        background-color: #5D4037;
        color: #F4EFE6 !important;
        padding: 18px 45px;
        border-radius: 8px;
        text-decoration: none;
        font-family: 'Cairo', sans-serif;
        font-weight: 700;
        transition: 0.3s;
        box-shadow: 0 4px 15px rgba(93, 64, 55, 0.1);
    }

    .btn-main:hover { background-color: #3E2723; transform: translateY(-2px); }

    .link-secondary {
        color: #5D4037 !important;
        text-decoration: none;
        font-family: 'Cairo', sans-serif;
        font-weight: 700;
        border-bottom: 1px solid #D4A373;
        padding-bottom: 2px;
        transition: 0.3s;
    }

    .link-secondary:hover {
        color: #D4A373 !important;
        border-color: #5D4037;
    }

    .features-layout { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; }
    .f-card { padding: 30px; border-radius: 20px; text-align: center; border: 1px solid #E0D5C1; transition: 0.3s; }
    .f-card i { font-size: 40px; color: #D4A373; }
    .f-card h4 { font-family: 'Cairo', sans-serif; color: #5D4037; font-size: 16px; margin-top: 15px; font-weight: 700; }
    
    .bg-sand { background: #F4EFE6; }
    .bg-white { background: #ffffff; }
    
    .bg-dark-custom { 
        background: #5D4037; 
        border: none;
    }

    .shift-up { transform: translateY(30px); }
    .shift-down { margin-top: -10px; }
</style>
@endsection