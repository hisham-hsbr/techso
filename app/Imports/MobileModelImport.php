<?php

namespace App\Imports;

use App\Models\Fixancare\Brand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Fixancare\MobileModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class MobileModelImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $device_count = Brand::where('name',"=", $row['brand_name'])->count();

        if($device_count==0){
            $row['brand_name']="";
            $brand_id=1;
        }
        if($device_count==1){

            $brand_id=(DB::table('brands')->where('name', $row['brand_name'])->first())->id;
        }
        $mobile_model = new MobileModel([
            "code"=>$row['mobile_model_code'],
            "name"=>$row['mobile_model_name'],
            "brand_id"=>$brand_id,
            "status"=>$row['status'],
            "created_by" => Auth::user()->id,
            "updated_by" => Auth::user()->id,
        ]);
        return $mobile_model;
    }

    public function rules(): array
    {
        return [
            'mobile_model_code' => 'required|unique:mobile_models,code',
            'mobile_model_name' => 'required',
            'brand_name' => 'required',

             // Above is alias for as it always validates in batches
             '*.mobile_model_code' => 'required|unique:mobile_models,code',
             '*.mobile_model_name' => 'required',
             '*.brand_name' => 'required',
        ];
    }
}
