<?php

namespace App\Imports;

use App\Models\Techso\Brand;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\Auth;

class BrandImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $brand = new Brand([
            "code"=>$row['brand_code'],
            "name"=>$row['brand_name'],
            "status"=>$row['status'],
            "created_by" => Auth::user()->id,
            "updated_by" => Auth::user()->id,
        ]);
        return $brand;
    }

    public function rules(): array
    {
        return [
            'brand_code' => 'required|unique:brands,code',
            'brand_name' => 'required',

             // Above is alias for as it always validates in batches
             '*.brand_code' => 'required|unique:brands,code',
             '*.brand_name' => 'required',
        ];
    }
}
