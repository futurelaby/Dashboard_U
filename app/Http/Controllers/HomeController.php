<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppUser;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Facade\FlareClient\Http\Response as HttpResponse;
//use Facade\FlareClient\Http\Response as HttpResponse;
use Redirect;
use Response;

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
        $usersnumber = AppUser::count();
        $Loggedin_number = AppUser::where('status',"loggedin")->count();
        $appUsers = AppUser::All();
        // $data = "";
        $data = array(
            'usersnumber'=> $usersnumber,
            'appUsers'=>$appUsers,
            'Loggedin_number'=>$Loggedin_number
        );
        return view('home') ->with($data);

    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return "create";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'StudentName' =>'required',
            'Student_id' =>'required'
        ]);
        $user = new AppUser;
        if (!isset($request->status))
            $user->status = 'waiting';
        else 
            $user->status = $request->status;
        
        $user->username = $request->StudentName;
        $user->student_id = $request->Student_id;
        $user->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $user = AppUser::where($where)->first();
        $data = array(
            "user"=>$user,
            "usingRecord" =>$user->UsingRecord
        );
        return response($user);
        // return response()->json($user);
		// return Response::json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'StudentName' =>'required',
            'Student_id' =>'required'
        ]);
        $user = AppUser::find($id);
        $user->username = $request->StudentName;
        $user->student_id = $request->Student_id;
        $user->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(isset($id))
        {
            $user = AppUser::find($id);
            $user->delete();
            return redirect('/');
        }
        else
        {
            return redirect('/')->with('message','success');
        }
    }
    public function deleteAll(Request $request)
    {
        $this->validate($request,[
            'checked' =>'required'
        ]);
        $checked = $request->checked;
        $ids =implode(",",$checked);
        AppUser::whereIn('id',explode(",",$ids))->delete();
        return redirect('/');
        // $checked = Request::input('checked',[]);
        foreach ($checked as $id) {
            AppUser::where("id",$id)->delete(); //Assuming you have a Todo model. 
        }
        return view("/");
        // $ids = $request->ids;
        // AppUser::whereIn('id',explode(",",$ids))->delete();
        // return response()->json(['success'=>"Products Deleted successfully."]);
        // return view('AppUsers.index');
        // return redirect('/')->with('success' ,'Post Deleted');
    }
    
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new UsersImport,request()->file('file'));
           
        return back();
    }
}
