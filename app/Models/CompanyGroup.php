<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyGroup extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function parent(){

        return $this->belongsTo(CompanyGroup::class,'company_group_id');

    }
}
