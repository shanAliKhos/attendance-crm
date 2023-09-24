<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use App\Imports\AttendanceImport;
use App\Models\Attendance;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx',
        ]);

        Excel::import(new AttendanceImport,$request->file('file'));

        return response()->json(['message' => 'Attendance data uploaded successfully'], 200);
    }

    public function show(Employee $employee){

        $attendanceRecords = $employee->attendances;
        $totalWorkingHours = 0;
        foreach ($attendanceRecords as $attendance) {
            $checkIn = Carbon::parse($attendance->check_in_time);
            $checkOut = Carbon::parse($attendance->check_out_time);
            $workingHours = $checkOut->diffInHours($checkIn);
            $totalWorkingHours += $workingHours;
        }

        return response()->json([
            'employee' => $employee,
            'attendance' => $attendanceRecords,
            'total_working_hours' => $totalWorkingHours,
        ], 200);
    }


}
