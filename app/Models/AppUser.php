<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppUser extends Model
{
    use HasFactory;
    public function UserRecord ()
    {
        return $this->hasOne('App\UserRecord');
    }
    public function UsingRecord()
    {
        return $this->hasOne('App\UsingRecord');
    }
}