<?php

namespace App\Imports;

use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class AttendanceImport implements ToCollection ,WithChunkReading
{

    public function collection(Collection $rows)
    {
        unset($rows[0]);
        foreach ($rows as $row) {
            Attendance::updateOrCreate(
                ['employee_id' => $row[1], 'date' => Carbon::createFromFormat('Y-m-d', $row[0])],
                ['check_in_time' => $row[2], 'check_out_time' => $row[3]]
            );

        }

    }

    public function chunkSize(): int
    {
        return 100;
    }

}
