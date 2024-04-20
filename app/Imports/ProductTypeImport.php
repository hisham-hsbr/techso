<?php

namespace App\Imports;

use App\Models\Techso\ProductType;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductTypeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ProductType([
            //
        ]);
    }
}
