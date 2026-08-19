<?php

namespace App\Http\Controllers;

use App\Models\Stf;
use App\Models\StfWd;
use App\Models\Wd;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AllocationController extends Controller
{
    public function index(): View
    {
        $allocations = StfWd::with(['stf', 'wd'])
            ->orderByDesc('Date')
            ->limit(100)
            ->get();

        $staff = Stf::orderBy('LastName')->orderBy('FirstName')->get();
        $wards = Wd::orderBy('Wd_Name')->get();

        return view('allocations.index', compact('allocations', 'staff', 'wards'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'Stf_No' => ['required', 'exists:Stf,Stf_No'],
            'Wd_No' => ['required', 'exists:Wd,Wd_No'],
            'Date' => ['required', 'date'],
            'Shift' => ['required', 'in:Morning,Evening,Night'],
        ]);

        StfWd::create([
            'StfWd_No' => 'ALLOC-'.Str::upper(Str::random(8)),
            ...$data,
        ]);

        return redirect()->route('allocations.index')
            ->with('status', 'Allocation recorded.');
    }

    public function destroy(StfWd $allocation): RedirectResponse
    {
        $allocation->delete();

        return redirect()->route('allocations.index')
            ->with('status', 'Allocation removed.');
    }
}
