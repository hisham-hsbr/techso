<?php

namespace App\Imports;

use App\Models\Techso\JobStatus;
use Maatwebsite\Excel\Concerns\ToModel;

class JobStatusImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new JobStatus([
            //
        ]);
    }
}
