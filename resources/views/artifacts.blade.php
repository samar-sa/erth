@extends('layouts.app')

@section('content')
<div style="max-width: 600px; margin: 0 auto; background-color: #F4EFE6; padding: 30px; border-radius: 20px; border: 1px solid #E0D5C1;">
    <h3 style="color: #5D4037; font-weight: 800; margin-bottom: 25px; text-align: center;">إضافة معلم جديد</h3>

    <form action="/artifacts" method="POST">
        @csrf 
        
        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: 700; color: #8D6E63; margin-bottom: 5px;">اسم المعلم</label>
            <input type="text" name="name" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #E0D5C1; background-color: #FDFBF7;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: 700; color: #8D6E63; margin-bottom: 5px;">الموقع التاريخي</label>
            <input type="text" name="location" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #E0D5C1; background-color: #FDFBF7;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: 700; color: #8D6E63; margin-bottom: 5px;">وصف وتفاصيل</label>
            <textarea name="description" rows="4" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #E0D5C1; background-color: #FDFBF7;"></textarea>
        </div>
        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: 700; color: #8D6E63; margin-bottom: 5px;">العصر التاريخي</label>
            <input type="text" name="era" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #E0D5C1; background-color: #FDFBF7;">        
        </div>
        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: 700; color: #8D6E63; margin-bottom: 5px;">رابط صورة الأثر</label>
            <input type="text" name="image" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #E0D5C1; background-color: #FDFBF7;">
        </div>
        
        <button type="submit" style="width: 100%; background-color: #5D4037; color: #F4EFE6; padding: 12px; border: none; border-radius: 8px; font-weight: 700; cursor: pointer;">
            حفظ في قاعدة البيانات
        </button>
    </form>
</div>
@endsection