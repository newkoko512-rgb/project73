<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    //
    protected $table = 'Wd';
    protected $primaryKey = 'Wd_No';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'Wd_No',
        'Wd_Name',
        'Location',
        'TotalBeds',
        'TelExtension'
    ];

    public function beds()
    {
        return $this->hasMany(Bed::class, 'Wd_No', 'Wd_No');
    }
}
