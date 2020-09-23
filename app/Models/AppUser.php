<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppUser extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['username','student_id'];
    public function UserRecord ()
    {
        return $this->hasOne('App\Models\UserRecord' , 'AppUser_id');
    }
    public function UsingRecord()
    {
        return $this->hasOne('App\Models\UsingRecord' , 'AppUser_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function($user)
        {
            $userRecord = new UserRecord();
            $userRecord->AppUser_id = $user['id'];
            $userRecord->save();
            $usingRecord = new UsingRecord();
            $usingRecord->AppUser_id = $user['id'];
            $usingRecord->save();

            //$user->name is available
            //$user->email is available
            //Do now what you want with them
        });
    }
}
