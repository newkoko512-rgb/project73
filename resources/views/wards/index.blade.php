<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ward Management - Wellmeadows Hospital</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 flex min-h-screen text-slate-800">

    <!-- Sidebar จำลอง -->
    <aside class="w-64 bg-white border-r border-slate-200 p-5 flex flex-col justify-between hidden md:flex">
        <div>
            <h2 class="text-xl font-extrabold text-blue-900 mb-8 flex items-center gap-2">
                <span class="text-red-600 text-2xl">✚</span> WELLMEADOWS
            </h2>
            <nav class="space-y-1 text-sm font-medium">
                <a href="#" class="block py-2.5 px-4 text-slate-600 rounded-lg hover:bg-slate-50">Dashboard</a>
                <a href="{{ route('wards.index') }}" class="block py-2.5 px-4 bg-indigo-50 text-indigo-700 font-semibold rounded-lg">Ward</a>
                <a href="#" class="block py-2.5 px-4 text-slate-600 rounded-lg hover:bg-slate-50">Staff Management</a>
                <a href="#" class="block py-2.5 px-4 text-slate-600 rounded-lg hover:bg-slate-50">Patient</a>
                <a href="#" class="block py-2.5 px-4 text-slate-600 rounded-lg hover:bg-slate-50">Outpatients</a>
                <a href="#" class="block py-2.5 px-4 text-slate-600 rounded-lg hover:bg-slate-50">Inpatients & Waiting List</a>
                <a href="#" class="block py-2.5 px-4 text-slate-600 rounded-lg hover:bg-slate-50">Medication</a>
                <a href="#" class="block py-2.5 px-4 text-slate-600 rounded-lg hover:bg-slate-50">Requisitions</a>
                <a href="#" class="block py-2.5 px-4 text-slate-600 rounded-lg hover:bg-slate-50">Supplies Inventory</a>
                <a href="#" class="block py-2.5 px-4 text-slate-600 rounded-lg hover:bg-slate-50">Suppliers</a>
            </nav>
        </div>
        <div class="flex items-center gap-3 pt-4 border-t border-slate-100">
            <div class="w-10 h-10 rounded-full bg-slate-200 flex items-center justify-center font-bold text-slate-600">DY</div>
            <div>
                <p class="text-sm font-bold text-slate-800">Donut Yeager</p>
                <p class="text-xs text-slate-400">Nurse</p>
            </div>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 p-8">
        <header class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Ward Management</h1>
                <p class="text-sm text-slate-500 mt-1">Manage hospital wards and bed location</p>
            </div>
            <div class="bg-white px-4 py-2 rounded-lg border border-slate-200 text-sm font-medium text-slate-500">
                05/08/2026 09:50
            </div>
        </header>

        <!-- Ward Grid Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse($wards as $ward)
                <a href="{{ route('wards.show', $ward->Wd_No) }}" class="block bg-white rounded-2xl border border-slate-200 p-6 shadow-sm hover:shadow-md transition">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h2 class="text-xl font-bold text-slate-800">{{ $ward->Wd_No }}</h2>
                            <p class="text-sm text-slate-500 font-medium">{{ $ward->Wd_Name }}</p>
                        </div>

                        <!-- แถบสถานะจำนวนเตียง (Badge) -->
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold {{ ($ward->occupied_beds_count ?? 0) >= ($ward->TotalBeds ?? 20) ? 'bg-red-100 text-red-700' : (($ward->occupied_beds_count ?? 0) > 0 ? 'bg-green-100 text-green-700' : 'bg-emerald-50 text-emerald-600') }}"> 
                            {{ $ward->occupied_beds_count ?? 0 }}/{{ $ward->TotalBeds }} Beds
                        </span>
                        
                    </div>

                    <div class="space-y-2 text-sm text-slate-600">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span>{{ $ward->Location }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a11.042 11.042 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <span>Extn {{ $ward->TelExtension }}</span>
                        </div>
                    </div>
                </a>
            @empty
                <p class="text-slate-400 col-span-2 text-center py-10">No wards found.</p>
            @endforelse
        </div>
    </main>
</body>
</html>