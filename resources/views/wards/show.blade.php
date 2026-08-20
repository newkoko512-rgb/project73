<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $ward->Wd_No }} Details - Wellmeadows Hospital</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 flex min-h-screen text-slate-800">

    <!-- Sidebar -->
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

    <main class="flex-1 p-8">
        <!-- Back Navigation & Title -->
        <div class="flex items-center gap-3 mb-6">
            <a href="{{ route('wards.index') }}" class="p-2 rounded-lg bg-white border border-slate-200 hover:bg-slate-50 transition">
                <svg class="w-5 h-5 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <h1 class="text-xl font-bold text-slate-800">{{ $ward->Wd_No }} – {{ $ward->Wd_Name }}</h1>
        </div>

        <div class="space-y-6">
            <!-- Bed Map Container -->
            <section class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
                <h2 class="text-sm font-bold text-slate-700 mb-4">Bed Map</h2>
                <div class="grid grid-cols-2 sm:grid-cols-5 gap-3">
                    @forelse($ward->beds as $bed)
                        @php
                            $isOccupied = strtolower($bed->BedStatus) === 'occupied';
                        @endphp
                        <div class="border {{ $isOccupied ? 'border-amber-300 bg-amber-50' : 'border-emerald-300 bg-emerald-50' }} rounded-xl py-3 text-center transition">
                            <div class="font-bold text-slate-800 text-sm">
                                Bed {{ $loop->iteration }}
                            </div>
                            <div class="text-xs {{ $isOccupied ? 'text-amber-700 font-semibold' : 'text-emerald-600 font-medium' }} mt-0.5">
                                {{ $bed->BedStatus }}
                            </div>
                        </div>
                    @empty
                        <p class="col-span-5 text-sm text-slate-400 text-center py-4">No beds allocated to this ward.</p>
                    @endforelse
                </div>
            </section>

            <!-- Ward Staff Container -->
            <section class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
                <h2 class="text-sm font-bold text-slate-700 mb-4">Ward Staff</h2>
                <div class="space-y-3">
                    @for($i = 0; $i < 5; $i++)
                        <div class="flex items-center gap-3 bg-slate-50 hover:bg-slate-100 rounded-xl p-3 transition border border-slate-100">
                            <div class="w-9 h-9 rounded-full bg-slate-200 flex items-center justify-center text-slate-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-sm font-bold text-slate-800">Donut Smith</h3>
                                <p class="text-xs text-slate-500">Charge Nurse</p>
                            </div>
                        </div>
                    @endfor
                </div>
            </section>
        </div>
    </main>
</body>
</html>