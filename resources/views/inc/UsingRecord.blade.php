<!-- Modal -->
<div class="modal fade " id="UsingRecoredModal" tabindex="-1" role="dialog" aria-labelledby="UsingRecoredModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
      <div class="modal-content">
        {{$user->id}}
        {!! Form::open(['action' => ['App\Http\Controllers\HomeController@update',$user->id ], 'method' =>'POST' , 'style'=>'width:100%']) !!}

        <div class="modal-header" style="border-bottom: 0 none;">
              <div class="row" style="width: 100%">
                  <div class="col-lg-6">
                      <div class="form-group">
                        {{Form::Label('StudentName','Student name :')}}
                        {{Form::text('StudentName',$user->username,['class' =>'form-control'])}}
                          {{-- <label for="StudentName" >Student name :</label>
                          <input type="text" class="form-control" id="StudentName" aria-describedby="emailHelp"> --}}
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="form-group">
                        {{Form::Label('Student_id','Student ID :')}}
                        {{Form::text('Student_id',$user->Student_id,['class' =>'form-control'])}}
                          {{-- <label for="Student_id" >Student ID :</label>
                          <input type="text" class="form-control" id="Student_id" aria-describedby="emailHelp"> --}}
                      </div>
                  </div>
              </div>
              
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>

        <div class="modal-body">

            <table class="table table-striped table-sm " id='tablet'>
                <thead>
                  <tr>
                    <th>EXP</th>
                    <?php
                      for ($i = 1 ; $i <17; $i++)
                        echo "<th>$i</th>";
                    ?>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Times</td>
                    <?php
                        for ($i = 0 ; $i <17; $i++)
                          echo "<td>".explode(',',$appUsers[1]->UsingRecord['exp_usage_time'])[$i]."</td>";
                    ?> 
                  </tr>
                </tbody>
              </table>
          
        </div>

        <div class="modal-footer">
          {{-- <button class="btn btn-secondary " data-dismiss="modal">Close</button> --}}
         
          {{Form::hidden('_method' , 'PUT')}} 
          {{Form::submit('Update',['class'=>'btn btn-primary mr-auto'])}}
          {!! Form::close() !!}
          {!! Form::open(['action' => ['App\Http\Controllers\HomeController@destroy',$user->id ], 'method' =>'POST']) !!}
          
          {{Form::submit('Delete',['class'=>'btn btn-danger '])}}
          {{Form::hidden('_method','DELETE')}} 
        {!! Form::close() !!}
          {{-- <button class="btn btn-danger" >Delete</button>
          <button class="btn btn-primary">Save changes</button> --}}
        </div>
        
      </div>
    </div>
  </div>