<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function provincial()
    {
        return $this->belongsTo(Provincial::class);
    }

    public function district()
    {
        return $this->hasMany(District::class);
    }
}
