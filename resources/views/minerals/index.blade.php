@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<div style="padding: 40px; background-color: #FDFBF7; min-height: 100vh; direction: rtl; font-family: 'Almarai', sans-serif;">
    <div style="max-width: 1200px; margin: 0 auto;">
        
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px; border-bottom: 2px solid #E0D5C1; padding-bottom: 20px;">
            <div>
                <h2 style="color: #5D4037; font-weight: 800; margin: 0; display: flex; align-items: center; gap: 15px; font-size: 28px;">
                    <i class="bi bi-gem" style="color: #D4A373;"></i> 
                    سجل الثروات المعدنية
                </h2>
                <p style="color: #8D6E63; margin-top: 10px; font-size: 16px; font-weight: 500; opacity: 0.85;">
                    أثرٌ باقٍ.. لحضارةٍ تضرب في جذور التاريخ
                </p>
            </div>
            
            @can('admin-only')
            <a href="{{ route('minerals.create') }}" style="background-color: #5D4037; color: white; padding: 12px 30px; border-radius: 50px; text-decoration: none; font-weight: 700; box-shadow: 0 4px 15px rgba(93, 64, 55, 0.2); display: flex; align-items: center; gap: 10px; transition: 0.3s;">
                <i class="bi bi-plus-circle-fill"></i>
                إضافة معدن جديد
            </a>
            @endcan
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 30px;">
            @foreach($minerals as $mineral)
            <div class="mineral-card" style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.03); border: 1px solid #E0D5C1; transition: 0.3s;">
                
                <div style="height: 220px; background-color: #F4EFE6; position: relative;">
                    @if($mineral->image)
                        <img src="{{ asset('images/' . $mineral->image) }}" style="width: 100%; height: 100%; object-fit: cover;">
                    @else
                        <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100%; color: #D7CCC8; gap: 10px;">
                            <i class="bi bi-intersect" style="font-size: 45px; opacity: 0.5;"></i>
                            <span style="font-size: 12px;">لا توجد صورة للمعدن</span>
                        </div>
                    @endif
                    
                </div>

                <div style="padding: 25px;">
                    <h3 style="color: #5D4037; font-size: 20px; margin-bottom: 15px; font-weight: 800;">{{ $mineral->name }}</h3>
                    
                    <div style="display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 18px;">
                        <span style="font-size: 11px; color: #5D4037; background: #F4EFE6; padding: 5px 14px; border-radius: 8px; font-weight: 700; border: 1px solid #E0D5C1;">
                            {{ $mineral->type }}
                        </span>
                        <span style="font-size: 11px; color: #795548; background: #FFFBF2; padding: 5px 14px; border-radius: 8px; font-weight: 700; border: 1px solid #F4EFE6;">
                            <i class="bi bi-palette-fill" style="color: #D4A373; font-size: 10px;"></i> {{ $mineral->color }}
                        </span>
                    </div>

                    <p style="color: #6D4C41; font-size: 14px; line-height: 1.7; height: 48px; overflow: hidden; margin-bottom: 20px; opacity: 0.9;">
                        {{ Str::limit($mineral->description, 90) }}
                    </p>

                    <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #F4EFE6; padding-top: 18px;">
                        
                        <a href="{{ route('minerals.show', $mineral->id) }}" style="text-decoration: none; color: #D4A373; font-weight: 800; font-size: 13px; display: flex; align-items: center; gap: 6px; transition: 0.2s;">
                            عرض المزيد <i class="bi bi-arrow-left-short" style="font-size: 18px;"></i>
                        </a>

                        @can('admin-only')
                        <div style="display: flex; gap: 15px;">
                            <a href="{{ route('minerals.edit', $mineral->id) }}" title="تعديل" style="color: #8D6E63; font-size: 18px; transition: 0.2s;">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="{{ route('minerals.delete', $mineral->id) }}" title="حذف" style="color: #e3342f; font-size: 18px; transition: 0.2s;" onclick="return confirm('هل أنت متأكد من حذف هذا المعدن؟')">
                                <i class="bi bi-trash3"></i>
                            </a>
                        </div>
                        @endcan
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<style>
    .mineral-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 30px rgba(93, 64, 55, 0.1) !important;
        border-color: #D4A373 !important;
    }
</style>
@endsection