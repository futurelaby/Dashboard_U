<?php

namespace App\Imports;

use App\Models\AppUser;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AppUser([
            'username'     => $row['name'],
            'student_id'   => $row['id']
        ]);
    }
}
