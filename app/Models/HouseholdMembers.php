<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseholdMembers extends Model
{
    use HasFactory;

    protected $fillable = ['household_members_name'];

    public function individual_household()
    {
        return $this->belongsTo(IndividualHousehold::class);
    }
}
