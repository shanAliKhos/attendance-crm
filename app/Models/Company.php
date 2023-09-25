<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function asset()
    {
        return $this->hasMany(Asset::class);
    }

    public function location()
    {
        return $this->hasMany(Location::class);
    }
}
