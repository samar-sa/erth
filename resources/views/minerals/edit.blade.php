@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<div style="padding: 40px; background-color: #FDFBF7; min-height: 100vh; direction: rtl; font-family: 'Almarai', sans-serif;">
    <div style="max-width: 600px; margin: 0 auto; background: white; padding: 40px; border-radius: 20px; border: 1px solid #E0D5C1; box-shadow: 0 10px 30px rgba(93, 64, 55, 0.05);">
        
        <div style="text-align: center; margin-bottom: 35px;">
            <div style="background: #F4EFE6; width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px;">
                <i class="bi bi-pencil-square" style="color: #5D4037; font-size: 25px;"></i>
            </div>
            <h2 style="color: #5D4037; font-weight: 800; margin: 0;">تحديث بيانات المعدن</h2>
            <p style="color: #8D6E63; font-size: 14px; margin-top: 5px;">تعديل سجل: {{ $mineral->name }}</p>
        </div>

         <form action="{{ route('minerals.update', $mineral->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div style="margin-bottom: 25px;">
                <label style="display: block; margin-bottom: 10px; font-weight: bold; color: #5D4037;">اسم المعدن:</label>
                <input type="text" name="name" value="{{ old('name', $mineral->name) }}" style="width: 100%; padding: 12px; border: 1px solid #E0D5C1; border-radius: 10px; outline: none; background: #FCFBF9;" required>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 25px;">
                <div>
                    <label style="display: block; margin-bottom: 10px; font-weight: bold; color: #5D4037;">النوع:</label>
                    <input type="text" name="type" value="{{ old('type', $mineral->type) }}" style="width: 100%; padding: 12px; border: 1px solid #E0D5C1; border-radius: 10px; background: #FCFBF9;" required>
                </div>
                <div>
                    <label style="display: block; margin-bottom: 10px; font-weight: bold; color: #5D4037;">اللون السائد:</label>
                    <input type="text" name="color" value="{{ old('color', $mineral->color) }}" style="width: 100%; padding: 12px; border: 1px solid #E0D5C1; border-radius: 10px; background: #FCFBF9;" required>
                </div>
            </div>

            <div style="margin-bottom: 25px;">
                <label style="display: block; margin-bottom: 10px; font-weight: bold; color: #5D4037;">تفاصيل المعدن:</label>
                <textarea name="description" rows="6" style="width: 100%; padding: 12px; border: 1px solid #E0D5C1; border-radius: 10px; outline: none; background: #FCFBF9; line-height: 1.6;" required>{{ old('description', $mineral->description) }}</textarea>
            </div>

            <div style="margin-bottom: 30px; padding: 20px; border: 1px solid #F4EFE6; border-radius: 15px; background: #FDFBF7;">
                <label style="display: block; margin-bottom: 15px; font-weight: bold; color: #5D4037;">صورة المعدن:</label>
                <div style="display: flex; align-items: center; gap: 20px;">
                    @if($mineral->image)
                        <div style="text-align: center;">
                            <img src="{{ asset('images/' . $mineral->image) }}" style="width: 80px; height: 80px; object-fit: cover; border-radius: 10px; border: 2px solid #D4A373; margin-bottom: 5px;">
                            <p style="font-size: 10px; color: #8D6E63; margin: 0;">الصورة الحالية</p>
                        </div>
                    @endif
                    <div style="flex: 1;">
                        <input type="file" name="image" style="width: 100%; padding: 10px; border: 1px dashed #D4A373; border-radius: 10px; background: white; font-size: 12px;">
                    </div>
                </div>
            </div>

            <div style="display: flex; gap: 15px;">
                <button type="submit" style="flex: 2; background: #5D4037; color: white; padding: 15px; border: none; border-radius: 10px; font-weight: bold; cursor: pointer;">حفظ التغييرات</button>
                <a href="{{ route('minerals.index') }}" style="flex: 1; text-align: center; background: #F4EFE6; color: #5D4037; padding: 15px; border-radius: 10px; text-decoration: none; font-weight: bold;">رجوع</a>
            </div>
        </form>
    </div>
</div>
@endsection