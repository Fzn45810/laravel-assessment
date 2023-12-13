<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tehsil extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function union_council()
    {
        return $this->hasMany(UnionCouncil::class);
    }
}
