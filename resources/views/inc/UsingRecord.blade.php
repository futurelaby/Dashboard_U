
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
                            <input type="text" class="form-control" id="StudentName" name = "StudentName">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="Student_id" >Student ID :</label>
                            <input type="text" class="form-control" id="Student_id" name="Student_id">
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
                    </tr>
                  </tbody>
              </table>
          </div>

          <div class="modal-footer">
          
            <button type="submit" class="btn btn-primary mr-auto">Save changes</button>
            
            @method('PUT')
        </form >
            {{-- {!! Form::open(['action' => ['App\Http\Controllers\HomeController@destroy',$user->id ], 'method' =>'POST']) !!} --}}
      <form method="POST" id="DeleteForm"> 
          {{csrf_field()}}
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-danger" name = "id" id="DeleteButton">Delete</button>
        </form>
    </div>
  </div>
</div>