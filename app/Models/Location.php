<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

}
