<?php

namespace App\Exports;

use App\Models\AppUser;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AppUser::select('student_id','username')->get();
        // return AppUser::All();
    }
}
