<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Hospital Staff') &middot; Wellmeadows Hospital</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col min-h-full font-sans text-slate-800 antialiased bg-slate-50">

    <!-- Header / Navigation Bar -->
    <header class="sticky top-0 z-50 bg-[#FFFEFE] text-white shadow-md border-b border-sky-900/40">
    

        <div class="mx-auto flex max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8 h-16">
            
            <!-- โลโก้ และ ชื่อระบบ -->
            <a href="{{ route('staff.index') }}" class="flex items-center gap-3 group">
                <!-- รูปโลโก้โรงพยาบาล -->
                <img src="{{ asset('images/logo.png') }}" 
                    alt="Wellmeadows Hospital Logo" 
                    class="h-15 w-auto object-contain drop-shadow transition duration-200 group-hover:scale-105">

                <div>
                    <span class="text-[20px] font-extrabold tracking-tight text-[#112D6E] block leading-tight">WELLMEADOWS</span>
                    <span class="text-[15px] text-[#9E2A2B] tracking-wider uppercase font-semibold">Hospital System</span>
                </div>
            </a>
                

            <!-- เมนูนำทาง (Navigation Links) -->
            <nav class="hidden md:flex items-center gap-1 text-sm font-medium">
                <a href="{{ route('staff.index') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-[#EAECF2] text-[#112D6E] hover:text-[#112D6E] transition">
                    <svg class="w-4 h-4 text-[#112D6E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    Staff Management
                </a>
                <a href="{{ route('staff.search') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-[#EAECF2] text-[#112D6E] hover:text-[#112D6E] transition">
                    <svg class="w-4 h-4 text-[#112D6E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    Search
                </a>
                <a href="{{ route('allocations.index') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-[#EAECF2] text-[#112D6E] hover:text-[#112D6E] transition">
                    <svg class="w-4 h-4 text-[#112D6E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    Allocations
                </a>
                <a href="{{ route('wards.report') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-[#EAECF2] text-[#112D6E] hover:text-[#112D6E] transition">
                    <svg class="w-4 h-4 text-[#112D6E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    Ward Report
                </a>
                <a href="{{ route('wards.report') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-[#EAECF2] text-[#112D6E] hover:text-[#112D6E] transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                </a>
            </nav>

            <!-- แสดงผู้ใช้งาน และ ปุ่ม Logout -->
            @auth
            <div class="flex items-center gap-3 border-l border-white/15 pl-5">
                <div class="hidden sm:flex flex-col text-right">
                    <span class="text-xs font-semibold text-white">{{ Auth::user()->name }}</span>
                    <span class="text-[10px] text-sky-300">Logged in</span>
                </div>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-rose-600/80 hover:bg-rose-600 text-white text-xs font-semibold shadow-sm hover:shadow transition duration-150">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        Logout
                    </button>
                </form>
            </div>
            @endauth
        </div>
        <!-- แถบสีไล่เฉดด้านบนสุด -->
        <div class="h-1 w-full bg-gradient-to-r from-[#9E2A2B] to-[#112D6E]"></div>
        
    </header>

    <!-- Main Content Container -->
    <main class="flex-1 mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8 py-8">
        
        <!-- Status Alert -->
        @if (session('status'))
            <div class="mb-6 flex items-start p-4 rounded-xl border border-emerald-200 bg-emerald-50 text-emerald-800 shadow-sm">
                <svg class="w-5 h-5 text-emerald-600 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <div class="text-sm font-medium">
                    {{ session('status') }}
                </div>
            </div>
        @endif

        <!-- Error Alert -->
        @if ($errors->any())
            <div class="mb-6 p-4 rounded-xl border border-rose-200 bg-rose-50 text-rose-800 shadow-sm">
                <div class="flex items-center mb-2">
                    <svg class="w-5 h-5 text-rose-600 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                    <strong class="font-semibold text-sm">Please fix the following errors:</strong>
                </div>
                <ul class="ml-7 text-sm list-disc space-y-1 text-rose-700">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Card สำหรับครอบเนื้อหาหลัก -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 p-6 sm:p-8">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-200 py-4 mt-auto">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-400 gap-2">
            <p>&copy; {{ date('Y') }} Wellmeadows Hospital System. All rights reserved.</p>
            <p class="text-[11px]">Hospital Staff Management Portal</p>
        </div>
    </footer>

</body>
</html>