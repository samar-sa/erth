@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<div style="direction: rtl; min-height: 100vh; background-color: #FDFBF7; font-family: 'Almarai', sans-serif; padding: 0;">

    <div style="max-width: 900px; margin: 0 auto; padding: 50px 20px 80px;">

        <div style="width: 100%; height: 450px; overflow: hidden; border-radius: 25px; box-shadow: 0 15px 35px rgba(93, 64, 55, 0.1); margin-bottom: 50px; border: 1px solid #F4EFE6;">
            @if($mineral->image)
                <img src="{{ asset('images/' . $mineral->image) }}" style="width: 100%; height: 100%; object-fit: cover; display: block;">
            @else
                <div style="width: 100%; height: 100%; background-color: #F4EFE6; display: flex; align-items: center; justify-content: center; color: #8D6E63;">
                    <i class="bi bi-gem" style="font-size: 60px;"></i>
                </div>
            @endif
        </div>
        
        <div style="margin-bottom: 40px; border-bottom: 2px solid #F4EFE6; padding-bottom: 30px;">
            <span style="background-color: #D4A373; color: white; padding: 6px 18px; border-radius: 50px; font-size: 13px; font-weight: 700; display: inline-block; margin-bottom: 15px;">
                {{ $mineral->type }}
            </span>
            
            <h1 style="color: #5D4037; font-size: 40px; font-weight: 800; margin: 0; line-height: 1.2;">{{ $mineral->name }}</h1>
            
            <div style="display: flex; gap: 25px; margin-top: 20px; color: #8D6E63; font-size: 16px; font-weight: 600;">
                <span style="display: flex; align-items: center; gap: 8px;">
                    <i class="bi bi-palette-fill" style="color: #D4A373;"></i> {{ $mineral->color }}
                </span>
                <span style="display: flex; align-items: center; gap: 8px;">
                    <i class="bi bi-info-circle-fill" style="color: #D4A373;"></i> ثروة وطنية
                </span>
            </div>
        </div>

        <div style="color: #5D4037;">
             <h3 style="font-weight: 800; margin-bottom: 20px; font-size: 22px; color: #5D4037;">تفاصيل المعدن والبيانات الجيولوجية:</h3>
             <div style="line-height: 2.1; font-size: 18px; text-align: justify; white-space: pre-line; color: #6D4C41; padding: 0 5px;">
                {{ $mineral->description }}
            </div>
        </div>

        <div style="margin-top: 70px; padding-top: 30px; border-top: 2px solid #F4EFE6; display: flex; justify-content: space-between; align-items: center;">
            <a href="{{ route('minerals.index') }}" style="text-decoration: none; color: #8D6E63; font-weight: 700; display: flex; align-items: center; gap: 10px; font-size: 15px;">
                <i class="bi bi-arrow-right-circle-fill" style="font-size: 22px; color: #D4A373;"></i>
                العودة إلى سجل الثروات المعدنية
            </a>
            
            @can('admin-only')
            <div style="display: flex; gap: 15px;">
                <a href="{{ route('minerals.edit', $mineral->id) }}" style="text-decoration: none; background-color: #5D4037; color: white; padding: 12px 30px; border-radius: 12px; font-weight: 700; font-size: 14px; box-shadow: 0 4px 12px rgba(93, 64, 55, 0.15);">
                    <i class="bi bi-pencil-square"></i> تعديل البيانات
                </a>
            </div>
            @endcan
        </div>

    </div>
</div>
@endsection