<?php

namespace App\Imports;

use App\Models\Techso\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\Auth;

class CustomersImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $customer = new Customer([
            "code" => $row['customer_code'],
            "name" => $row['customer_name'],
            "status" => $row['status'],
            "created_by" => Auth::user()->id,
            "updated_by" => Auth::user()->id,
        ]);
        return $customer;
    }
    public function rules(): array
    {
        return [
            'customer_code' => 'required|unique:customers,code',
            'customer_name' => 'required',

            // Above is alias for as it always validates in batches
            '*.customer_code' => 'required|unique:customers,code',
            '*.customer_name' => 'required',
        ];
    }
}