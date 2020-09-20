<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppUser;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $appUsers = AppUser::All();
        $appUsers = array(array(
            'id' =>'1',
            'username' =>'test',
            'student_id'=>'123',
            'status'=>'good'
        ),
        array(
            'id' =>'2',
            'username' =>'test2',
            'student_id'=>'1234',
            'status'=>'notgood'
        ));

        return view('home') ->with('appUsers',$appUsers);
    }
}
