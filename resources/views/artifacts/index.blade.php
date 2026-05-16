@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<div style="padding: 40px; background-color: #FDFBF7; min-height: 100vh; direction: rtl; font-family: 'Almarai', sans-serif;">
    <div style="max-width: 1200px; margin: 0 auto;">
        
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px; border-bottom: 2px solid #E0D5C1; padding-bottom: 20px;">
            <div>
    <h2 style="color: #5D4037; font-weight: 800; margin: 0; display: flex; align-items: center; gap: 15px; font-size: 28px;">
        <i class="bi bi-bank" style="color: #D4A373;"></i> 
        سجل المعالم الأثرية
    </h2>
    <p style="color: #8D6E63; margin-top: 10px; font-size: 16px; font-weight: 500; opacity: 0.85;">
        أثرٌ باقٍ.. لحضارةٍ تضرب في جذور التاريخ
    </p>
</div>
            
            @can('admin-only')
            <a href="{{ route('artifacts.create') }}" style="background-color: #5D4037; color: white; padding: 12px 30px; border-radius: 50px; text-decoration: none; font-weight: 700; box-shadow: 0 4px 15px rgba(93, 64, 55, 0.2); display: flex; align-items: center; gap: 10px; transition: 0.3s;">
                <i class="bi bi-plus-circle-fill"></i>
                إضافة معلم جديد
            </a>
            @endcan
        </div>

        <div style="margin-bottom: 30px;">
            <form action="{{ route('artifacts.index') }}" method="GET" style="display: flex; flex-wrap: wrap; gap: 15px; align-items: center;">
                <span style="color: #5D4037; font-weight: bold; font-size: 14px;">تصفية حسب:</span>
                
                <div style="display: flex; align-items: center; gap: 8px; background: white; padding: 5px 15px; border-radius: 50px; border: 1px solid #E0D5C1;">
                    <i class="bi bi-calendar3" style="color: #D4A373; font-size: 13px;"></i>
                    <select name="era" onchange="this.form.submit()" style="border: none; outline: none; background: transparent; font-size: 13px; color: #5D4037; cursor: pointer;">
                        <option value="">كل العصور</option>
                        <option value="العصر ما قبل الإسلام" {{ request('era') == 'العصر ما قبل الإسلام' ? 'selected' : '' }}>العصر ما قبل الإسلام</option>
                        <option value="العصر الإسلامي" {{ request('era') == 'العصر الإسلامي' ? 'selected' : '' }}>العصر الإسلامي</option>
                        <option value="العصر الحديث" {{ request('era') == 'العصر الحديث' ? 'selected' : '' }}>العصر الحديث</option>
                    </select>
                </div>

                <div style="display: flex; align-items: center; gap: 8px; background: white; padding: 5px 15px; border-radius: 50px; border: 1px solid #E0D5C1;">
                    <i class="bi bi-geo-alt" style="color: #D4A373; font-size: 13px;"></i>
                    <input type="text" name="location" value="{{ request('location') }}" placeholder="اكتب اسم المنطقة..." style="border: none; outline: none; background: transparent; font-size: 13px; color: #5D4037; width: 150px;">
                    <button type="submit" style="background: none; border: none; color: #5D4037; cursor: pointer;">
                        <i class="bi bi-search"></i>
                    </button>
                </div>

                @if(request()->filled('era') || request()->filled('location'))
                    <a href="{{ route('artifacts.index') }}" style="color: #e3342f; text-decoration: none; font-size: 12px; font-weight: bold;">
                        <i class="bi bi-x-circle"></i> إعادة ضبط
                    </a>
                @endif
            </form>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 30px;">
            @foreach($artifacts as $item)
            <div class="artifact-card" style="background-color: white; border-radius: 25px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border: 1px solid #F4EFE6; transition: 0.3s;">
                
                <div style="height: 220px; background-color: #F4EFE6; position: relative;">
                    @if($item->image)
                        <img src="{{ asset('images/' . $item->image) }}" style="width: 100%; height: 100%; object-fit: cover;">
                    @else
                        <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100%; color: #8D6E63; gap: 10px;">
                            <i class="bi bi-image" style="font-size: 40px;"></i>
                            <span>لا توجد صورة</span>
                        </div>
                    @endif
                    <span style="position: absolute; top: 15px; left: 15px; background-color: rgba(212, 163, 115, 0.9); color: white; padding: 5px 15px; border-radius: 50px; font-size: 11px; font-weight: 700;">
                        {{ $item->era }}
                    </span>
                </div>

                <div style="padding: 25px;">
                    <h3 style="color: #5D4037; margin: 0 0 10px 0; font-size: 19px; font-weight: 800;">{{ $item->name }}</h3>
                    
                    <p style="color: #8D6E63; font-size: 13px; margin-bottom: 15px; display: flex; align-items: center; gap: 8px;">
                        <i class="bi bi-geo-alt-fill" style="color: #D4A373;"></i>
                        {{ $item->location }}
                    </p>
                    
                    <p style="color: #6d6d6d; font-size: 13px; line-height: 1.6; height: 40px; overflow: hidden; margin-bottom: 15px;">
                        {{ Str::limit($item->description, 70) }}
                    </p>

                    <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #F4EFE6; padding-top: 15px;">
                        
                        <a href="{{ route('artifacts.show', $item->id) }}" style="text-decoration: none; color: #D4A373; font-weight: 800; font-size: 13px; display: flex; align-items: center; gap: 6px; transition: 0.2s;">
                            عرض المزيد <i class="bi bi-arrow-left-short" style="font-size: 18px;"></i>
                        </a>

                        @can('admin-only')
                        <div style="display: flex; gap: 15px;">
                            <a href="{{ route('artifacts.edit', $item->id) }}" title="تعديل" style="text-decoration: none; color: #8D6E63; font-size: 16px;">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="{{ route('artifacts.delete', $item->id) }}" title="حذف" style="text-decoration: none; color: #e3342f; font-size: 16px;" onclick="return confirm('هل أنت متأكد من حذف هذا المعلم؟')">
                                <i class="bi bi-trash3-fill"></i>
                            </a>
                        </div>
                        @endcan
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @if($artifacts->isEmpty())
        <div style="text-align: center; padding: 100px 0; color: #8D6E63;">
            <i class="bi bi-archive" style="font-size: 50px; opacity: 0.5;"></i>
            <p style="margin-top: 20px; font-size: 18px;">لا توجد معالم تطابق بحثك.</p>
        </div>
        @endif

    </div>
</div>

<style>
    .artifact-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(93, 64, 55, 0.12) !important;
    }
</style>
@endsection