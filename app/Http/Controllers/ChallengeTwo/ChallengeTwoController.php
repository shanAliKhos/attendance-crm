<?php

namespace App\Http\Controllers\ChallengeTwo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChallengeTwoController extends Controller
{
    public function find_duplicates(){
        $array = [2, 3, 1, 2, 3];
        $collection = collect($array);
        $duplicates = $collection->duplicates();
        $duplicateArray = $duplicates->all();
        dd($duplicateArray);

    }

}
