@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<div style="padding: 40px; background-color: #FDFBF7; min-height: 100vh; direction: rtl; font-family: 'Almarai', sans-serif;">
    <div style="max-width: 600px; margin: 0 auto; background-color: white; padding: 35px; border-radius: 25px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border: 1px solid #F4EFE6;">
        
        <h2 style="color: #5D4037; font-weight: 800; margin-bottom: 30px; display: flex; align-items: center; gap: 12px;">
            <i class="bi bi-plus-circle-fill" style="color: #D4A373;"></i> 
            إضافة معدن جديد
        </h2>

        <form action="{{ route('minerals.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div style="margin-bottom: 25px;">
                <label style="display: block; margin-bottom: 10px; font-weight: bold; color: #5D4037;">اسم المعدن:</label>
                <input type="text" name="name" value="{{ old('name') }}" style="width: 100%; padding: 12px; border: 1px solid #E0D5C1; border-radius: 10px; background: #FCFBF9; outline: none;" placeholder="مثلاً: الذهب" required>
                @error('name') <small style="color: red;">{{ $message }}</small> @enderror
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 25px;">
                <div>
                    <label style="display: block; margin-bottom: 10px; font-weight: bold; color: #5D4037;">النوع:</label>
                    <input type="text" name="type" value="{{ old('type') }}" placeholder="مثلاً: معادن نفيسة" style="width: 100%; padding: 12px; border: 1px solid #E0D5C1; border-radius: 10px; background: #FCFBF9; outline: none;" required>
                    @error('type') <small style="color: red;">{{ $message }}</small> @enderror
                </div>
                <div>
                    <label style="display: block; margin-bottom: 10px; font-weight: bold; color: #5D4037;">اللون السائد:</label>
                    <input type="text" name="color" value="{{ old('color') }}" style="width: 100%; padding: 12px; border: 1px solid #E0D5C1; border-radius: 10px; background: #FCFBF9; outline: none;" placeholder="مثلاً: أصفر بريقي" required>
                    @error('color') <small style="color: red;">{{ $message }}</small> @enderror
                </div>
            </div>

            <div style="margin-bottom: 25px;">
                <label style="display: block; margin-bottom: 10px; font-weight: bold; color: #5D4037;">تفاصيل المعدن:</label>
                <textarea name="description" rows="6" style="width: 100%; padding: 12px; border: 1px solid #E0D5C1; border-radius: 10px; background: #FCFBF9; outline: none; line-height: 1.6;" placeholder="أدرج المواصفات الفنية، الجيولوجية " required>{{ old('description') }}</textarea>
                @error('description') <small style="color: red;">{{ $message }}</small> @enderror
            </div>
            
            <div style="margin-bottom: 30px;">
                <label style="display: block; color: #5D4037; font-weight: 700; margin-bottom: 8px;">صورة المعدن:</label>
                <div style="position: relative; border: 2px dashed #D4A373; border-radius: 15px; padding: 25px; text-align: center; background-color: #FDFBF7;">
                    <i class="bi bi-cloud-arrow-up" style="font-size: 30px; color: #D4A373;"></i>
                    <input type="file" name="image" style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; opacity: 0; cursor: pointer;" required>
                    <p style="margin: 10px 0 0; color: #8D6E63; font-size: 13px;">اضغط لرفع صورة المعدن</p>
                </div>
                @error('image')
                    <div style="color: #D84315; font-size: 13px; font-weight: bold; margin-top: 10px; display: flex; align-items: center; gap: 5px;">
                        <i class="bi bi-exclamation-circle"></i> {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" style="width: 100%; background-color: #5D4037; color: white; padding: 15px; border-radius: 50px; border: none; font-weight: 700; font-size: 16px; cursor: pointer; transition: 0.3s; box-shadow: 0 4px 15px rgba(93, 64, 55, 0.2);">
                <i class="bi bi-save"></i> حفظ في السجل
            </button>
            
            <a href="{{ route('artifacts.index') }}" style="display: block; text-align: center; margin-top: 20px; color: #8D6E63; text-decoration: none; font-size: 14px; font-weight: 600;">
                <i class="bi bi-arrow-right"></i> إلغاء والعودة للقائمة
            </a>
        </form>
    </div>
</div>
@endsection