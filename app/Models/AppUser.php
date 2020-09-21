<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppUser extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function UserRecord ()
    {
        return $this->hasOne('App\Models\UserRecord' , 'AppUser_id');
    }
    public function UsingRecord()
    {
        return $this->hasOne('App\Models\UsingRecord' , 'AppUser_id');
    }
}
