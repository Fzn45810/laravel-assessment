<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincial extends Model
{
    use HasFactory;
    protected $fillable = ['province_name'];

    public function division()
    {
        return $this->hasMany(Division::class);
    }
}
