@extends('layout_admin')
@section('title')
    Sửa User
@endsection
@section('body')
<div class="d-flex justify-content-between">
    <h3 class="mb-4">EDIT User</h3>
    <div>
      <a href="{{route('admin.user')}}" class="btn btn-outline-secondary rounded-0">
        <i class="far fa-long-arrow-left"></i> Back
      </a>
    </div>
  </div>
  <form class="row" action="{{route('admin.user.update_U',['id'=>$dsU->id])}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-md-8 mb-4">
      <div class="card rounded-0 border-0 shadow-sm mb-4">
        <div class="card-body">
          <h6 class="pb-3 border-bottom">Basic Info</h6>
          <div class="mb-3">
            <label for="name" class="form-label">Name *</label>
            <input type="text" class="form-control rounded-0" id="name" name="name" value="{{$dsU->name}}" required>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Email *</label>
            <input type="text" class="form-control rounded-0" id="email" name="email" value="{{$dsU->email}}" required>
          </div>
          
          <div class="row">
           
            <div class="col mb-3">
                <div class="mb-3">
                    <label for="name" class="form-label">Phone *</label>
                    <input type="number" class="form-control rounded-0" id="phone" name="phone" value="{{$dsU->phone}}" required>
                  </div>
            </div>
            <div class="col mb-3">
                <div class="mb-3">
                    <label for="name" class="form-label">Address *</label>
                    <input type="text" class="form-control rounded-0" id="address" name="address" value="{{$dsU->address}}" required>
                  </div>
            </div>
        
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Role *</label>
            <select name="role" id="role">
                
                <option value="user">user</option>
                <option value="admin">admin</option>
               
            </select>
          </div>
        </div>
        
      </div>
      
    </div>
    <div class="col-md-4 mb-4">
      <div class="card rounded-0 border-0 shadow-sm">
        
      </div>
      <button type="submit" class="btn btn-primary btn-lg rounded-0 mt-4 w-100">Edit User</button>
    </div>
  </form>
@endsection
