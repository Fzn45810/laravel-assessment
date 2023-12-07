<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnionCouncil extends Model
{
    use HasFactory;

    protected $fillable = ['union_council_name'];

    public function tehsil()
    {
        return $this->belongsTo(Tehsil::class);
    }

    public function individual_household()
    {
        return $this->hasMany(IndividualHousehold::class);
    }
}
