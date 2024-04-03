<?php

namespace App\Imports;

use App\Models\Fixancare\WorkStatus;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\Auth;

class WorkStatusImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $brand = new WorkStatus([
            "code"=>$row['work_status_code'],
            "name"=>$row['work_status_name'],
            "status"=>$row['status'],
            "created_by" => Auth::user()->id,
            "updated_by" => Auth::user()->id,
        ]);
        return $brand;
    }

    public function rules(): array
    {
        return [
            'work_status_code' => 'required|unique:work_statuses,code',
            'work_status_name' => 'required',

             // Above is alias for as it always validates in batches
             '*.work_status_code' => 'required|unique:work_statuses,code',
             '*.work_status_name' => 'required',
        ];
    }
}
