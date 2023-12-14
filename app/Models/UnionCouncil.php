<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnionCouncil extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function tehsil()
    {
        return $this->belongsTo(Tehsil::class);
    }

    public function individual_household()
    {
        return $this->hasMany(IndividualHousehold::class);
    }

    public function workers()
    {
        return $this->belongsToMany(User::class, 'union_council_workers', 'union_council_id', 'worker_id');
    }
}
