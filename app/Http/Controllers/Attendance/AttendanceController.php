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
    public function index()
    {
        $attendances = Employee::with('attendances')
            ->get()
            ->map(function ($employee) {
                $latestAttendance = $employee->attendances()->latest()->first();

                return [
                    'name' => $employee->name,
                    'check_in' => $latestAttendance ? $latestAttendance->check_in : 'N/A',
                    'check_out' => $latestAttendance ? $latestAttendance->check_out : 'N/A',
                    'total_working_hours' => $this->calculateTotalWorkingHours($latestAttendance),
                ];
            });

        return response()->json([
            'data' => $attendances,
        ]);
    }

    private function calculateTotalWorkingHours($attendance)
    {
        if (!$attendance || !$attendance->check_in || !$attendance->check_out) {
            return 'N/A';
        }
        $checkInTime = Carbon::parse($attendance->check_in);
        $checkOutTime = Carbon::parse($attendance->check_out);

        return $checkInTime->diffInHours($checkOutTime);
    }

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
