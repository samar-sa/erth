@extends('layouts.app')

@section('content')
<div style="padding: 40px; background-color: #FDFBF7; min-height: 100vh; direction: rtl; font-family: 'Segoe UI', sans-serif;">
    <div style="max-width: 600px; margin: 0 auto; background: white; padding: 40px; border-radius: 20px; border: 1px solid #E0D5C1; box-shadow: 0 10px 30px rgba(93, 64, 55, 0.05);">
        
        <div style="text-align: center; margin-bottom: 35px;">
            <h2 style="color: #5D4037; font-weight: 800;">تعديل بيانات الأثر</h2>
            <p style="color: #8D6E63; font-size: 14px;">تحديث معلومات معلم: {{ $artifact->name }}</p>
        </div>

        <form action="{{ route('artifacts.update', $artifact->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: bold; color: #5D4037;">اسم المعلم :</label>
                <input type="text" name="name" value="{{ $artifact->name }}" style="width: 100%; padding: 12px; border: 1px solid #E0D5C1; border-radius: 10px;" required>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                <div>
                    <label style="display: block; margin-bottom: 8px; font-weight: bold; color: #5D4037;">العصر:</label>
                    <select name="era" style="width: 100%; padding: 12px; border: 1px solid #E0D5C1; border-radius: 10px; background: white;">
                        <option value="العصر ما قبل الإسلام" {{ $artifact->era == 'العصر ما قبل الإسلام' ? 'selected' : '' }}>العصر ما قبل الإسلام</option>
                        <option value="العصر الإسلامي" {{ $artifact->era == 'العصر الإسلامي' ? 'selected' : '' }}>العصر الإسلامي</option>
                        <option value="العصر الحديث" {{ $artifact->era == 'العصر الحديث' ? 'selected' : '' }}>العصر الحديث</option>
                    </select>
                </div>
                <div>
                    <label style="display: block; margin-bottom: 8px; font-weight: bold; color: #5D4037;">الموقع:</label>
                    <input type="text" name="location" value="{{ $artifact->location }}" style="width: 100%; padding: 12px; border: 1px solid #E0D5C1; border-radius: 10px;" required>
                </div>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: bold; color: #5D4037;">الوصف التاريخي:</label>
                <textarea name="description" rows="4" style="width: 100%; padding: 12px; border: 1px solid #E0D5C1; border-radius: 10px;" required>{{ $artifact->description }}</textarea>
            </div>

            <div style="margin-bottom: 30px;">
                <label style="display: block; margin-bottom: 8px; font-weight: bold; color: #5D4037;">تغيير الصورة:</label>
                @if($artifact->image)
                    <div style="margin-bottom: 10px;">
                        <img src="{{ asset('images/' . $artifact->image) }}" style="width: 120px; border-radius: 10px; border: 1px solid #E0D5C1;">
                        <p style="font-size: 11px; color: #8D6E63; margin-top: 5px;">الصورة الحالية</p>
                    </div>
                @endif
                <input type="file" name="image" style="width: 100%; padding: 10px; border: 1px dashed #E0D5C1; border-radius: 10px;">
            </div>

            <div style="display: flex; gap: 15px;">
                <button type="submit" style="flex: 2; background: #5D4037; color: white; padding: 15px; border: none; border-radius: 10px; font-weight: bold; cursor: pointer;">حفظ التغييرات</button>
                <a href="{{ route('artifacts.index') }}" style="flex: 1; text-align: center; background: #F4EFE6; color: #5D4037; padding: 15px; border-radius: 10px; text-decoration: none; font-weight: bold;">رجوع</a>
            </div>
        </form>
    </div>
</div>
@endsection