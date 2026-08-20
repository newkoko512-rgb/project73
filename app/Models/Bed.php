<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    //

    protected $table = 'Bed';
    protected $primaryKey = 'Bed_No';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'Bed_No',
        'Wd_No',
        'BedStatus'
    ];

    public function ward()
    {
        return $this->belongsTo(Ward::class, 'Wd_No', 'Wd_No');
    }
}
