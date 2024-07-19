@extends('layout_admin')
@section('title')
    Khách hàng
@endsection
@section('body')
<div class="d-flex justify-content-between">
    <h3 class="mb-4">User</h3>
    {{-- <div>
      <a href="#" class="btn btn-outline-success rounded-0">Manage Categories</a>
      <a href="{{route('admin.product.add')}}" class="btn btn-primary rounded-0">Add Product</a>
    </div> --}}
  </div>
  <div class="row">
   
    
  </div>
  
  <div class="card rounded-0 border-0 shadow-sm">
    <div class="card-body">
      <table class="table text-center">
        <thead>
          <tr>
            <th class="text-start" colspan="1">User</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Role</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="align-middle">
          @foreach ($dsU as $sp)
          <tr>
            <td >
              {{$sp->id}}
            </td>
            <td >
            {{$sp->name}}
            </td>
            <td >
            
              {{$sp->email}}
            </td>
            <td>
              {{$sp->phone}}
            </td>
           <td>
            {{$sp->address}}
           </td>
           <td>
            {{$sp->role}}
           </td>
            <td>
             
              <a href="{{route('admin.user.edit_U',['id'=>$sp->id])}}" class="btn btn-outline-warning btn-sm">
                <i class="fas fa-pencil fa-fw"></i>
              </a>
              <a href="{{route('admin.user.delete_U',['id'=>$sp->id])}}" class="btn btn-outline-danger btn-sm" onclick="return confirm('Bạn chắc chắn muốn xóa không')">
                <i class="fas fa-times fa-fw"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
        {{-- {{$dsSp->links()}} --}}
    </div>
  </div>
@endsection