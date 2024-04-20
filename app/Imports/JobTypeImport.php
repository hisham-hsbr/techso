<?php

namespace App\Imports;

use App\Models\Techso\JobType;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithValidation;

class JobTypeImport implements ToModel, WithHeadingRow, WithValidation
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $job_type = new JobType([
            "code"=>$row['job_type_code'],
            "name"=>$row['job_type_name'],
            "status"=>$row['status'],
            "created_by" => Auth::user()->id,
            "updated_by" => Auth::user()->id,
        ]);
        return $job_type;
    }

    public function rules(): array
    {
        return [
            'job_type_code' => 'required|unique:job_types,code',
            'job_type_name' => 'required',

             // Above is alias for as it always validates in batches
             '*.job_type_code' => 'required|unique:job_types,code',
             '*.job_type_name' => 'required',
        ];
    }
}
