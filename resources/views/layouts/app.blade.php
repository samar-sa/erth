<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إرث</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&family=Cairo:wght@700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        * {
            font-family: 'Almarai', sans-serif !important;
        }
        
        .brand-font {
            font-family: 'Cairo', sans-serif !important;
            letter-spacing: 0px;
        }

        body {
            background-color: #FDFBF7;
            color: #5D4037;
            margin: 0;
        }

        .nav-link-custom {
            color: #5D4037; 
            text-decoration: none; 
            margin: 0 12px; 
            font-weight: 400; 
            font-size: 15px;
            transition: 0.3s;
        }
        .nav-link-custom:hover {
            color: #D4A373;
        }

        .navbar-brand-custom:hover {
            color: #D4A373 !important;
            transform: scale(1.05);
            transition: 0.3s;
        }
    </style>
</head>
<body>

    <nav style="background-color: #F4EFE6; padding: 15px 0; box-shadow: 0 2px 10px rgba(0,0,0,0.05); border-bottom: 1px solid #E0D5C1;">
        <div class="container" style="display: flex; justify-content: space-between; align-items: center;">
            
            <a href="/" class="brand-font navbar-brand-custom" style="color: #5D4037; text-decoration: none; font-size: 32px; font-weight: 900; display: inline-block;">إرث</a>
            
            <div style="display: flex; align-items: center;">
                <a href="/" class="nav-link-custom">الرئيسية</a>
                <a href="{{ route('artifacts.index') }}" class="nav-link-custom">الآثار</a>
                <a href="{{ route('minerals.index') }}" class="nav-link-custom">المعادن</a>                
                
                <div style="display: flex; gap: 8px; align-items: center; margin-right: 15px; border-right: 1px solid #E0D5C1; padding-right: 15px;">
                    @guest
                        <a href="{{ route('login') }}" style="background-color: transparent; color: #5D4037; border: 1px solid #5D4037; padding: 5px 15px; border-radius: 50px; text-decoration: none; font-weight: 700; font-size: 13px; transition: 0.3s; display: flex; align-items: center; gap: 5px;">
                            <i class="bi bi-door-open"></i> دخول
                        </a>
                        
                        <a href="{{ route('register') }}" style="background-color: #5D4037; color: #F4EFE6; padding: 6px 15px; border-radius: 50px; text-decoration: none; font-weight: 700; font-size: 13px; transition: 0.3s; display: flex; align-items: center; gap: 5px;">
                            <i class="bi bi-person-plus"></i> تسجيل جديد
                        </a>
                    @else
                        <span style="font-size: 14px; font-weight: 700; color: #8D6E63; margin-left: 10px;">
                            <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                        </span>
                        
                        <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                            @csrf
                            <button type="submit" style="background-color: #bb1e1e; color: white; padding: 5px 15px; border-radius: 50px; border: none; font-weight: 700; font-size: 13px; cursor: pointer; display: flex; align-items: center; gap: 5px;">
                                <i class="bi bi-box-arrow-right"></i> خروج
                            </button>
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <main style="min-height: 75vh; padding: 40px 0;">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success text-center" style="border-radius: 15px; background-color: #E8F5E9; border-color: #C8E6C9; color: #2E7D32; font-weight: 700;">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <footer style="background-color: #F4EFE6; padding: 40px 0; border-top: 1px solid #E0D5C1; text-align: center;">
        <div class="container">
            <h4 class="brand-font" style="font-weight: 900; color: #5D4037; margin-bottom: 10px; font-size: 28px;">إرث</h4>
            <p style="color: #8D6E63; font-size: 14px; margin-bottom: 20px;">المنصة الوطنية لـ <span style="font-weight: 800;">توثيق التراث الوطني السعودي</span></p>
            <div style="width: 50px; height: 2px; background-color: #D4A373; margin: 0 auto 20px;"></div>
            <p style="color: #A1887F; font-size: 12px; margin: 0;">&copy; 2026 جميع الحقوق محفوظة</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>