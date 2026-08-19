<?php

namespace App\Http\Controllers;

use App\Models\Wd;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WardReportController extends Controller
{
    public function show(Request $request): View
    {
        $date = $request->validate(['date' => ['nullable', 'date']])['date'] ?? null;

        $wards = Wd::with(['allocations' => function ($query) use ($date) {
            $query->when($date, fn ($q) => $q->whereDate('Date', $date))
                ->with(['stf.positions.pos']);
        }])
            ->orderBy('Wd_Name')
            ->get();

        return view('wards.report', compact('wards', 'date'));
    }
}
