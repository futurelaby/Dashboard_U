
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title"> Data </h3>
            <div class="card-body">
                <h5> users number : {{$usersnumber}} </h5>
                <h5> logins: </h5>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Users</h3>
            <div class="table-responsive">
              <table class="table table-striped table-sm " id="data-table" >
                <thead>
                  <tr>
                    <th><input name ="select_all" type="checkbox"/> Select</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Account created</th>
                    <th>Account Activated</th>
                    <th>Loggedin</th>
                    <th>Info</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($appUsers as $user)
                        <tr>
                            <td><input name = {{$user['id']}}  type="checkbox"/>
                            <td>{{$user['student_id']}}</td>
                            <td>{{$user['username']}}</td>
                            <td>{{$user->UserRecord['create_account_date']}}</td>
                            <td>{{$user->UserRecord['verify_account_date']}}</td>
                            <td>{{$user->UserRecord['login_date']}}</td>
                            <td>
                                {{-- <form action="{{ route('AppUsers.destroy',$user->id) }}" method="POST"> --}}
                                    {{-- <a class="btn btn-info" id="show-customer" data-toggle="modal" data-id="{{ $user->id }}" >Show</a> --}}
                                    <a href="javascript:void(0)" class="btn btn-success" id="edit-customer" data-toggle="modal" data-id="{{ $user->id }}">Info </a>
                                    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
                                    {{-- <a id="delete-customer" data-id="{{ $user->id }}" class="btn btn-danger delete-user">Delete</a></td> --}}
                                {{-- </form> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
        </div>
        <div class="card-footer">
            
            {{-- <button class="btn btn-primary" data-toggle="collapse" data-target="#AddUserDiv">Add user</button> --}}
            <button class="btn btn-primary" onclick="Adduser()">Add user</button>
            <button class="btn btn-danger" onclick="Delete()">Delete user</button>
        </div>
        <div  class="card-body collapse" id ="AddUserDiv">
            <h5>Add user:</h5>
            <form action="/AppUsers" method="POST">
                <input type="hidden" name="_method" value="POST">
                @csrf
                <div class="form-group" >
                    <label for="StudentName" >Student name :</label>
                    <input type="text" class="form-control" id="StudentName" aria-describedby="emailHelp" name = "StudentName" style="width: 30%">
                </div>
                <div class="form-group">
                    <label for="Student_id" >Student ID :</label>
                    <input type="text" class="form-control" id="Student_id" aria-describedby="emailHelp" name="Student_id" style="width: 30%">
                </div>
                <button type="submit" class="btn btn-primary" >Submit</button>
            </form>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade " id="UsingRecoredModal" tabindex="-1" role="dialog" aria-labelledby="UsingRecoredModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
      <div class="modal-content">
        {{-- {!! Form::open(['action' => ['App\Http\Controllers\HomeController@update',$user->id ], 'method' =>'POST' , 'style'=>'width:100%']) !!} --}}
        <form id="UpdateForm" style="width: 100%" method="POST">
          {{csrf_field()}}
          <input type="hidden" name="_method" value="PUT">
          <div class="modal-header" style="border-bottom: 0 none;">
                <div class="row" style="width: 100%">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="StudentName" >Student name :</label>
                            <input type="text" class="form-control" id="Modal_StudentName" name = "StudentName">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="Student_id" >Student ID :</label>
                            <input type="text" class="form-control" id="Modal_Student_id" name="Student_id">
                        </div>
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>

          </div>

          <div class="modal-body" id ="userData">
              
          </div>

          <div class="modal-footer">
          
            <button type="submit" class="btn btn-primary mr-auto">Save changes</button>
            
        </form >
            {{-- {!! Form::open(['action' => ['App\Http\Controllers\HomeController@destroy',$user->id ], 'method' =>'POST']) !!} --}}
      <form method="POST" id="DeleteForm" onsubmit="return confirm('Do you really want to Delete user?');"> 
          {{csrf_field()}}
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-danger" name = "id" id="DeleteButton">Delete</button>
        </form>
    </div>
  </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>

// function validateMyForm()
// {
//     if(check if your conditions are not satisfying)
//     { 
//         alert("validation failed false");
//         returnToPreviousPage();
//         return false;
//     }

//     alert("validations passed");
//     return true;
// }

$(document).ready(function(){

    /* Edit customer */
    $('body').on('click', '#edit-customer', function () {
        var customer_id = $(this).data('id');
        
        $.get('AppUsers/'+customer_id+'/edit', function (data) {
            
            $('#btn-update').val("Update");
            $('#btn-save').prop('disabled',false);
            $('#UsingRecoredModal').modal('show');
            $('#Modal_StudentName').val(data.username);
            $('#Modal_Student_id').val(data.student_id);
            $('#tablet tr').not(':first').remove();
            $('#DeleteButton').val(data.student_id);
            $('#UpdateForm').attr('action', '/AppUsers/'+data.id);
            $('#DeleteForm').attr('action', '/AppUsers/'+data.id);

            var html = "";
            if(data.using_record.exp_usage_time !== null)
            {
                html += '<table class="table table-striped table-sm " id="tablet">';
                html += '<thead><tr><th>EXP</th>';
                for (i = 1 ; i <17; i++)
                    html +='<th>'+i+'</th>';
                html += '</tr></thead><tbody>';
                html += '<tr> <td>Time</td>';
                  
                for(var i = 1; i < data.using_record.exp_usage_time.length; i++)
                {
                    if(i>=17)
                        break
                    var t = data.using_record.exp_usage_time.split(",")[i-1];
                    html += '<td>' +t+'</td>' ;

                }
                html += '</tr></tbody></table>';
            }
            else{
                console.log("no data");
                html +='<h3>No data</h3>';
            }
            $('#userData').html(html);
        })
    });

    var dataTable = document.getElementById('data-table');
    var checkItAll = dataTable.querySelector('input[name="select_all"]');
    var inputs = dataTable.querySelectorAll('tbody>tr>td>input');
    checkItAll.addEventListener('change', function() 
    {
        if (checkItAll.checked) {
            inputs.forEach(function(input) {
            input.checked = true;
            });  
        }

        if (!checkItAll.checked) {
            inputs.forEach(function(input) {
            input.checked = false;
            });  
        }
    });
})

    
var collapse = true;
    function Adduser()
    {
        if(collapse)
            {$('#AddUserDiv').collapse('show');}
        else
            {$('#AddUserDiv').collapse('hide');}
        collapse= !collapse;
    }
    function Delete()
    {
        
    }

</script>
