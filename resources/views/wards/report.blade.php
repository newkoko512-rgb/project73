@extends('layouts.app')

@section('title', 'Ward Report')

@section('content')
    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Staff allocated per ward</h1>
            <p class="mt-1 text-sm text-slate-500">Allocations are dated shifts (Morning / Evening / Night).</p>
        </div>

        <form method="GET" action="{{ route('wards.report') }}" class="flex items-end gap-2">
            <div>
                <label for="date" class="block text-sm font-medium text-slate-700">Show allocations for date</label>
                <input type="date" id="date" name="date" value="{{ $date ?? '' }}"
                       class="mt-1 rounded border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:outline-none">
            </div>
            <button type="submit" class="rounded bg-sky-600 px-4 py-2 text-sm font-medium text-white hover:bg-sky-700">
                Filter
            </button>
            @if (!empty($date))
                <a href="{{ route('wards.report') }}" class="px-3 py-2 text-sm text-slate-600 hover:text-slate-900">Clear</a>
            @endif
        </form>
    </div>

    <div class="space-y-6">
        @forelse ($wards as $ward)
            <div class="overflow-hidden rounded-lg bg-white shadow">
                <div class="flex flex-wrap items-baseline justify-between gap-2 border-b border-slate-200 bg-slate-50 px-4 py-3">
                    <div>
                        <h2 class="text-lg font-semibold text-slate-900">{{ $ward->Wd_Name }}</h2>
                        <p class="text-xs text-slate-500">
                            {{ $ward->Wd_No }} &middot; {{ $ward->Location }} &middot; {{ $ward->TotalBeds }} beds
                            &middot; ext. {{ $ward->TelExtension }}
                        </p>
                    </div>
                    <span class="text-xs font-medium text-slate-500">
                        {{ $ward->allocations->count() }} allocation(s)
                        @if (!empty($date))
                            on {{ \Carbon\Carbon::parse($date)->format('d M Y') }}
                        @endif
                    </span>
                </div>

                @if ($ward->allocations->isNotEmpty())
                    <table class="min-w-full divide-y divide-slate-100 text-sm">
                        <thead>
                            <tr class="text-left text-xs font-semibold uppercase tracking-wide text-slate-400">
                                <th class="px-4 py-2">Date</th>
                                <th class="px-4 py-2">Shift</th>
                                <th class="px-4 py-2">Staff</th>
                                <th class="px-4 py-2">Position</th>
                                <th class="px-4 py-2">Contact</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach ($ward->allocations->sortByDesc('Date') as $alloc)
                                <tr>
                                    <td class="px-4 py-2 whitespace-nowrap">{{ $alloc->Date->format('d M Y') }}</td>
                                    <td class="px-4 py-2">
                                        <span class="rounded px-2 py-0.5 text-xs font-medium
                                            {{ $alloc->Shift === 'Night' ? 'bg-slate-800 text-white' : ($alloc->Shift === 'Evening' ? 'bg-amber-100 text-amber-800' : 'bg-sky-100 text-sky-800') }}">
                                            {{ $alloc->Shift }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-2 font-medium text-slate-900">
                                        {{ $alloc->stf?->full_name ?? 'Deleted staff' }}
                                    </td>
                                    <td class="px-4 py-2 text-xs text-slate-500">
                                        @forelse ($alloc->stf?->positions ?? [] as $p)
                                            {{ $p->pos->Pos_Name ?? $p->Pos_No }}
                                        @empty
                                            &mdash;
                                        @endforelse
                                    </td>
                                    <td class="px-4 py-2 text-xs text-slate-500">{{ $alloc->stf?->TelNo }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="px-4 py-6 text-center text-sm text-slate-400">
                        No staff allocated
                        @if (!empty($date)) on {{ \Carbon\Carbon::parse($date)->format('d M Y') }} @endif.
                    </p>
                @endif
            </div>
        @empty
            <p class="rounded-lg bg-white px-6 py-10 text-center text-slate-400 shadow">
                No wards defined yet.
            </p>
        @endforelse
    </div>
@endsection