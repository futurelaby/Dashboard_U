<!-- Modal -->
<div class="modal fade " id="UsingRecoredModal" tabindex="-1" role="dialog" aria-labelledby="UsingRecoredModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <form style="width: 100%">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="StudentName" >Student name :</label>
                                <input type="text" class="form-control" id="StudentName" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Student_id" >Student ID :</label>
                                <input type="text" class="form-control" id="Student_id" aria-describedby="emailHelp">
                            </div>
                        </div>
                    </div>
                
            </form>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">

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
                            $html .= '<td>'.$user['username'].'</td>';
                            $html .= '<td>1,001</td>';
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

        <div class="modal-footer">
          <button class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button class="btn btn-primary">Save changes</button>
          <button class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>