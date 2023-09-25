<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('attendance', [\App\Http\Controllers\Attendance\AttendanceController::class,'index']);
Route::post('attendance', [\App\Http\Controllers\Attendance\AttendanceController::class,'store']);
Route::get('attendance/{employee}', [\App\Http\Controllers\Attendance\AttendanceController::class,'show']);

Route::get('challenge-two', [\App\Http\Controllers\ChallengeTwo\ChallengeTwoController::class,'find_duplicates']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
