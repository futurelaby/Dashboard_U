@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title"> Data </h3>
            <div class="card-body">
                <h5> users number : </h5>
                <h5> logins: </h5>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Users</h3>
            <div class="table-responsive">
              <table class="table table-striped table-sm ">
                <thead>
                  <tr>
                    <th><input name ="ALL" type="checkbox"/> Select</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Account created</th>
                    <th>Account Activated</th>
                    <th>Loggedin</th>
                    <th>Info</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($appUsers as $user) {
                            $html = '<tr>'; 
                            $html .= '<td><input name ='.$user['id'].' type="checkbox"/>';
                            $html .= '<td>1,001</td>';
                            $html .= '<td>'.$user['username'].'</td>';
                            $html .= '<td>1,001</td>';
                            $html .= '<td>1,001</td>';
                            $html .= '<td>1,001</td>';
                            $html .= '<td><button class="btn btn-primary" data-toggle="modal" data-target="#UsingRecoredModal"></button></td>';
                            $html .= '</tr>';
                            echo ($html);
                        }
                            
                    ?>
                </tbody>
              </table>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary">Add user</button>
            <button class="btn btn-danger">Delet user</button>


        </div>
    </div>
</div>

<div>
    @include('inc.UsingRecord')
</div>
@endsection

<script src="{{asset('js/custom.js')}}" type="text/javascript"></script>