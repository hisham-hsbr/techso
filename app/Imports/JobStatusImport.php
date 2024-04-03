<?php

namespace App\Imports;

use App\Models\Fixancare\JobStatus;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\Auth;

class JobStatusImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $brand = new JobStatus([
            "code"=>$row['job_status_code'],
            "name"=>$row['job_status_name'],
            "status"=>$row['status'],
            "created_by" => Auth::user()->id,
            "updated_by" => Auth::user()->id,
        ]);
        return $brand;
    }

    public function rules(): array
    {
        return [
            'job_status_code' => 'required|unique:job_statuses,code',
            'job_status_name' => 'required',

             // Above is alias for as it always validates in batches
             '*.job_status_code' => 'required|unique:job_statuses,code',
             '*.job_status_name' => 'required',
        ];
    }
}
