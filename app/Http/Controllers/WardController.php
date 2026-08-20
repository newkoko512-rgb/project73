<?php

namespace App\Http\Controllers;

use App\Models\Ward;
use Illuminate\Http\Request;

class WardController extends Controller
{
    //
    public function index()
    {
        $wards = Ward::withCount([
            'beds as occupied_beds_count' => function ($query) {
                $query->where('BedStatus', 'Occupied');
            }
        ])->get()
        ->sortBy('Wd_No', SORT_NATURAL); // เรียงตามลำดับตัวเลขอัตโนมัติ

        return view('wards.index', compact('wards'));
    }

    // หน้าแสดงผังเตียงและเจ้าหน้าที่ประจำ Ward (Detail View)
    public function show($id)
    {
        $ward = Ward::with('beds')->findOrFail($id);
        return view('wards.show', compact('ward'));
    }
}
