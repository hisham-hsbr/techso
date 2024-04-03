<?php

namespace App\Imports;

use App\Models\Permission;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\Auth;

class PermissionsImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $permission = new Permission([
            "name"=>$row['name'],
            "parent"=>$row['parent'],
            "status"=>$row['status'],
            "created_by" => Auth::user()->id,
            "updated_by" => Auth::user()->id,
        ]);
        return $permission;

    }
    public function rules(): array
    {
        return [
            // 'brand_code' => 'required|unique:brands,code',
            // 'brand_name' => 'required',

            //  // Above is alias for as it always validates in batches
            //  '*.brand_code' => 'required|unique:brands,code',
            //  '*.brand_name' => 'required',
        ];
    }
}
