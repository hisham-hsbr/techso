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
            "name" => $row['customer_company_name'],
            "contact_name" => $row['customer_contact_name'],
            "phone_1" => $row['customer_phone_1'],
            "status" => isset($row['status']) ? $row['status'] : 1,
            "created_by" => Auth::user()->id,
            "updated_by" => Auth::user()->id,
        ]);
        return $customer;
    }
    public function rules(): array
    {
        return [
            'customer_phone_1' => 'required|unique:customers,phone_1',
            'customer_contact_name' => 'required',

            // Above is alias for as it always validates in batches
            '*.customer_phone_1' => 'required|unique:customers,phone_1',
            '*.customer_contact_name' => 'required',
        ];
    }
}
