{{-- This modal is for testing how to show and add data to modal with jquery --}}
<!-- Add and Edit customer modal -->
<div class="modal fade" id="crud-modal" aria-hidden="true" >
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <h4 class="modal-title" id="customerCrudModal"></h4>
    </div>
    <div class="modal-body">
    <form name="custForm" action="{{ route('AppUsers.store') }}" method="POST">
    <input type="hidden" name="cust_id" id="cust_id" >
    @csrf
    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Name:</strong>
    <input type="text" name="name" id="name" class="form-control" placeholder="Name" onchange="validate()" >
    </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Email:</strong>
    <input type="text" name="email" id="email" class="form-control" placeholder="Email" onchange="validate()">
    </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Address:</strong>
    <input type="text" name="address" id="address" class="form-control" placeholder="Address" onchange="validate()" onkeypress="validate()">
    </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary" disabled>Submit</button>
    <a href="{{ route('AppUsers.index') }}" class="btn btn-danger">Cancel</a>
    </div>
    </div>
    </form>
    </div>
    </div>
    </div>
    </div>