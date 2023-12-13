<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseholdMembers extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function individual_household()
    {
        return $this->belongsTo(IndividualHousehold::class);
    }
}
