<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Hospital Staff') &middot; Wellmeadows Hospital</title>
    @vite('resources/css/app.css')
</head>
<body class="h-full font-sans text-slate-800 antialiased bg-slate-50 flex flex-col">

    <!-- Header & Navigation Bar (พื้นหลังสี #112D6E) -->
    <header class="sticky top-0 z-50 bg-[#FFFFFF] text-white shadow-md border-b-4 [border-image:linear-gradient(to_right,#9E2A2B,#102A6B)_1]">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8 h-16">
            
            <!-- Brand Logo -->
            <a href="{{ route('staff.index') }}" class="flex items-center gap-3 text-lg font-bold tracking-tight text-white hover:opacity-90 transition-opacity">
                <!-- ใส่โลโก้รูปภาพ logo.png หน้าชื่อ Wellmeadows Hospital -->
                <img src="{{ asset('images/logo.png') }}" alt="Hospital Logo" class="h-15 w-auto object-contain">
                <span class="hidden sm:inline text-[#102A6B]">WELLMEADOW HOSPITAL</span>
            </a>

            <!-- Navigation Links -->
            <nav class="flex items-center gap-1 sm:gap-2 text-sm font-medium">
                <a href="{{ route('staff.index') }}" 
                   class="rounded-lg px-3 py-2 text-[#102A6B] hover:bg-[#EAECF2] hover:text-[#9E2A2B] transition-all">
                    Staff Management
                </a>
                <a href="{{ route('staff.search') }}" 
                   class="rounded-lg px-3 py-2 text-[#102A6B] hover:bg-[#EAECF2] hover:text-[#9E2A2B] transition-all">
                    Search
                </a>
                <a href="{{ route('allocations.index') }}" 
                   class="rounded-lg px-3 py-2 text-[#102A6B] hover:bg-[#EAECF2] hover:text-[#9E2A2B] transition-all">
                    Allocations
                </a>
                <a href="{{ route('wards.report') }}" 
                   class="rounded-lg px-3 py-2 text-[#102A6B] hover:bg-[#EAECF2] hover:text-[#9E2A2B] transition-all">
                    Ward Report
                </a>
            </nav>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="mx-auto w-full max-w-7xl flex-1 px-4 sm:px-6 lg:px-8 py-8">
        
        <!-- Success Alert Notification -->
        @if (session('status'))
            <div class="mb-6 flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50/90 p-4 text-sm text-emerald-900 shadow-sm">
                <svg class="h-5 w-5 text-emerald-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="font-medium">{{ session('status') }}</span>
            </div>
        @endif

        <!-- Validation Error Notification -->
        @if ($errors->any())
            <div class="mb-6 rounded-xl border border-rose-200 bg-rose-50/90 p-4 text-sm text-rose-900 shadow-sm">
                <div class="flex items-center gap-2 font-semibold text-rose-950 mb-2">
                    <svg class="h-5 w-5 text-rose-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                    </svg>
                    <span>Please fix the following errors:</span>
                </div>
                <ul class="list-inside list-disc space-y-1 pl-2 text-rose-800">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="mt-auto border-t border-slate-200 bg-white py-4 text-center text-xs text-slate-500">
        &copy; {{ date('Y') }} Wellmeadows Hospital Staff System. All rights reserved.
    </footer>

</body>
</html>