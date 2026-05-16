@extends('layouts.app')

@section('content')
<div style="padding: 80px 20px; background-color: #FDFBF7; min-height: 100vh; direction: rtl;">
    <div style="max-width: 900px; margin: 0 auto; background: white; padding: 60px 40px; border-radius: 40px; border: 1px solid #E0D5C1; box-shadow: 0 15px 50px rgba(93,64,55,0.05); text-align: center;">
        
        <div style="background: #F4EFE6; width: 90px; height: 90px; border-radius: 25px; display: flex; align-items: center; justify-content: center; margin: 0 auto 30px; transform: rotate(45deg);">
            <i class="bi bi-info-circle-fill" style="color: #D4A373; font-size: 40px; transform: rotate(-45deg);"></i>
        </div>

        <h1 style="color: #5D4037; font-weight: 800; font-size: 36px; margin-bottom: 25px;">من نحن</h1>
        
        <p style="color: #6D4C41; font-size: 20px; line-height: 1.9; margin-bottom: 45px; text-align: center; max-width: 700px; margin-left: auto; margin-right: auto;">
            نحنُ منصة رقمية وطنية متخصصة في <span style="font-weight: 800; color: #D4A373;">توثيق التراث الوطني السعودي</span>، نهدف إلى الربط بين العلم والتاريخ عبر رصد وحفظ المعالم الأثرية الخالدة والثروات المعدنية التي تزخر بها أرضنا الغالية.
        </p>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 25px; margin-top: 20px;">
            
            <div style="background: #FDFBF7; padding: 30px; border-radius: 20px; border: 1px solid #F4EFE6; transition: 0.3s;">
                <div style="color: #D4A373; margin-bottom: 15px; font-size: 24px;"><i class="bi bi-eye-fill"></i></div>
                <h3 style="color: #5D4037; font-weight: 800; margin-bottom: 15px; font-size: 22px;">رؤيتنا</h3>
                <p style="color: #8D6E63; font-size: 16px; line-height: 1.7;">
                    أن نكون المرجع الرقمي الأول للباحثين والمهتمين بالثروات المعدنية وعراقةِ الآثار في المملكة العربية السعودية.
                </p>
            </div>

            <div style="background: #FDFBF7; padding: 30px; border-radius: 20px; border: 1px solid #F4EFE6; transition: 0.3s;">
                <div style="color: #D4A373; margin-bottom: 15px; font-size: 24px;"><i class="bi bi-flag-fill"></i></div>
                <h3 style="color: #5D4037; font-weight: 800; margin-bottom: 15px; font-size: 22px;">أهدافنا</h3>
                <p style="color: #8D6E63; font-size: 16px; line-height: 1.7;">
                    تيسير الوصول للمعلومات التاريخية والعلمية بأسلوب تقني حديث، يجمع بين الدقة التنظيمية والجودة البصرية.
                </p>
            </div>

        </div>

        <div style="margin-top: 60px;">
            <a href="{{ url('/') }}" style="background: #5D4037; color: #F4EFE6; padding: 15px 45px; border-radius: 12px; text-decoration: none; font-weight: 700; font-size: 16px; transition: 0.3s; display: inline-block; box-shadow: 0 10px 20px rgba(93, 64, 55, 0.1);">
                <i class="bi bi-house-door" style="margin-left: 8px;"></i> العودة للرئيسية
            </a>
        </div>
    </div>
</div>

<style>
    * {
        font-family: 'Almarai', sans-serif !important;
    }
</style>
@endsection