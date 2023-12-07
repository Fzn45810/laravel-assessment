<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndividualHousehold extends Model
{
    use HasFactory;

    protected $fillable = ['individual_household_name'];

    public function union_council()
    {
        return $this->belongsTo(UnionCouncil::class);
    }

    public function household_members()
    {
        return $this->hasMany(HouseholdMembers::class);
    }
}
