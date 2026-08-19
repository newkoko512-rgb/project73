<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เข้าสู่ระบบ - {{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
            background: linear-gradient(135deg, #9E2A2B 0%, #112D6E 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 1rem;
            position: relative; /* 1. เพิ่มตัวนี้ เพื่อให้ปุ่มขวาบนอ้างอิงจากขอบหน้าจอ */
            box-sizing: border-box;
        }

        /* 2. ปรับ CSS สำหรับโลโก้และชื่อขวาบน */
        .top-right-brand {
            position: absolute;
            top: 1.5rem;
            left: 1.5rem; /* เปลี่ยนจาก right เป็น left เพื่อย้ายไปฝั่งซ้าย */
            display: flex;
            align-items: center;
            gap: 0.75rem;
            z-index: 10;
            background: rgba(255, 255, 255, 0.95);
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        .brand-logo {
            height: 70px; /* ความสูงโลโก้ */
            width: auto;
        }
        .brand-title {
            font-size: 1.3rem;
            font-weight: 1000;
            color: #112D6E; /* สีข้อความ WELLMEADOWS HOSPITAL */
            margin: 0;
            white-space: nowrap;
        }

        .login-card {
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            padding: 2.5rem;
            width: 100%;
            max-width: 420px;
        }
        .login-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #112D6E;
            text-align: center;
            margin-bottom: 0.5rem;
            text-underline-offset: 6px;
            text-decoration-thickness: 2px;
        }
        .login-subtitle {
            font-size: 0.9rem;
            color: #706f6c;
            text-align: center;
            margin-bottom: 2rem;
        }
        .form-group {
            margin-bottom: 1.25rem;
        }
        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
        }
        .form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            font-size: 1rem;
            color: #1b1b18;
            background: #fff;
            transition: border-color 0.15s, box-shadow 0.15s;
            box-sizing: border-box;
        }
        .form-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
        }
        .form-input::placeholder {
            color: #9ca3af;
        }
        .remember-group {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }
        .remember-group input[type="checkbox"] {
            width: 1rem;
            height: 1rem;
            border-radius: 0.25rem;
            border: 1px solid #d1d5db;
            accent-color: #667eea;
        }
        .remember-group label {
            font-size: 0.875rem;
            color: #6b7280;
        }
        .btn-login {
            width: 100%;
            padding: 0.75rem 1rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            border: none;
            border-radius: 0.5rem;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: opacity 0.15s, transform 0.1s;
        }
        .btn-login:hover {
            opacity: 0.9;
        }
        .btn-login:active {
            transform: scale(0.98);
        }
        .error-message {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #dc2626;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            margin-bottom: 1.25rem;
        }
        .demo-info {
            margin-top: 1.5rem;
            padding: 1rem;
            background: #faf8f8;
            border: 1px solid #112D6E;
            border-radius: 0.5rem;
            font-size: 0.8rem;
            color: #112D6E;
            text-align: center;
        }
        .demo-info strong {
            display: block;
            margin-bottom: 0.25rem;
        }
    </style>
</head>
<body>

    <!-- 3. วาง top-right-brand ไว้ตรงนี้ (ใต้อยู่ใต้ body โดยตรง นอกการ์ด login-card) -->
    <div class="top-right-brand">
        <!-- เปลี่ยน path รูปตรงนี้ตามที่คุณเซฟรูปไว้ เช่น asset('images/logo.png') -->
        <img src="{{ asset('images/logo.png') }}" alt="Wellmeadows Hospital Logo" class="brand-logo">
        <span class="brand-title">WELLMEADOWS <br>HOSPITAL</span>
    </div>

    <div class="login-card">
        <h1 class="login-title">เข้าสู่ระบบเพื่อใช้งาน</h1>
        <p class="login-subtitle">กรอกอีเมลและรหัสผ่านของคุณเพื่อเข้าสู่ระบบ</p>

        @if ($errors->any())
            <div class="error-message">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email" class="form-label">อีเมล</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-input"
                    value="{{ old('email') }}"
                    placeholder="กรอกอีเมลของคุณ"
                    required
                    autofocus
                >
            </div>

            <div class="form-group">
                <label for="password" class="form-label">รหัสผ่าน</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-input"
                    placeholder="กรอกรหัสผ่านของคุณ"
                    required
                >
            </div>

            <div class="remember-group">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">จดจำฉัน</label>
            </div>

            <button type="submit" class="btn-login">
                เข้าสู่ระบบ
            </button>
        </form>

        <div class="demo-info">
            <strong>ข้อมูลสำหรับทดสอบ</strong>
            อีเมล: test@example.com
            รหัสผ่าน: password
        </div>
    </div>
</body>
</html>