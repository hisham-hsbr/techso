<?php

namespace App\Imports;

use App\Models\Fixancare\MobileComplaint;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\Auth;

class MobileComplaintImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $job_type = new MobileComplaint([
            "code"=>$row['mobile_complaint_code'],
            "name"=>$row['mobile_complaint_name'],
            "status"=>$row['status'],
            "created_by" => Auth::user()->id,
            "updated_by" => Auth::user()->id,
        ]);
        return $job_type;
    }

    public function rules(): array
    {
        return [
            'mobile_complaint_code' => 'required|unique:mobile_complaints,code',
            'mobile_complaint_name' => 'required',

             // Above is alias for as it always validates in batches
             '*.mobile_complaint_code' => 'required|unique:mobile_complaints,code',
             '*.mobile_complaint_name' => 'required',
        ];
    }
}
