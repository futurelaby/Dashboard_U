
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
                                <form action="{{ route('AppUsers.destroy',$user->id) }}" method="POST">
                                    {{-- <a class="btn btn-info" id="show-customer" data-toggle="modal" data-id="{{ $user->id }}" >Show</a> --}}
                                    <a href="javascript:void(0)" class="btn btn-success" id="edit-customer" data-toggle="modal" data-id="{{ $user->id }}">Info </a>
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                    {{-- <a id="delete-customer" data-id="{{ $user->id }}" class="btn btn-danger delete-user">Delete</a></td> --}}
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary">Add user</button>
            <button class="btn btn-danger">Delete user</button>
        </div>
    </div>
</div>

<div>
    @include('inc.UsingRecord')
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
    

$(document).ready(function(){

    /* Edit customer */
    $('body').on('click', '#edit-customer', function () {
        var customer_id = $(this).data('id');
        
        $.get('AppUsers/'+customer_id+'/edit', function (data) {
            console.log(data.using_record.exp_usage_time);
            $('#btn-update').val("Update");
            $('#btn-save').prop('disabled',false);
            $('#UsingRecoredModal').modal('show');
            $('#StudentName').val(data.username);
            $('#Student_id').val(data.student_id);
            $('#tablet tr').not(':first').remove();
            var html = '<tr> <td>Time</td>';

            for(var i = 1; i < data.using_record.exp_usage_time.length; i++)
            {
                if(i>=17)
                    break
                var t = data.using_record.exp_usage_time.split(",")[i-1];
                html += '<td>' +t+'</td>' ;

            }
            html += '</tr>';
            $('#tablet tr').first().after(html);
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
</script>
