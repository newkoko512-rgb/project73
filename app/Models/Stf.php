<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stf extends Model
{
    use HasFactory;

    protected $table = 'Stf';

    protected $primaryKey = 'Stf_No';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'Stf_No', 'FirstName', 'LastName', 'Address', 'TelNo', 'DOB', 'Sex', 'NIN',
    ];

    protected $casts = [
        'DOB' => 'date',
    ];

    public function getFullNameAttribute(): string
    {
        return trim($this->FirstName.' '.$this->LastName);
    }

    public function qualifications(): HasMany
    {
        return $this->hasMany(StfQual::class, 'Stf_No', 'Stf_No');
    }

    public function positions(): HasMany
    {
        return $this->hasMany(StfPos::class, 'Stf_No', 'Stf_No');
    }

    public function workExperiences(): HasMany
    {
        return $this->hasMany(StfWorkExp::class, 'Stf_No', 'Stf_No');
    }

    public function allocations(): HasMany
    {
        return $this->hasMany(StfWd::class, 'Stf_No', 'Stf_No');
    }
}
