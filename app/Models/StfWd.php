<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StfWd extends Model
{
    protected $table = 'StfWd';

    protected $primaryKey = 'StfWd_No';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'StfWd_No', 'Stf_No', 'Wd_No', 'Date', 'Shift',
    ];

    protected $casts = [
        'Date' => 'date',
    ];

    public function stf(): BelongsTo
    {
        return $this->belongsTo(Stf::class, 'Stf_No', 'Stf_No');
    }

    public function wd(): BelongsTo
    {
        return $this->belongsTo(Wd::class, 'Wd_No', 'Wd_No');
    }
}
