@extends('layout')
@section('title')
    Đăng Ký
@endsection
@section('body')
<h2 class="text-center fw-bold p-3" style="color: #198754;">REGISTER</h2>

<div class="row  justify-content-center ">
  <div class="col-sm-4 col-md-4  p-4 px-xl-5 " >
      <form  action="" method="post">
        @csrf
          <span class="form-label px-2" style="color: #198754;" >Name *:</span>
          <input type="text"   class="form-control" id="" name="name" required>
          <span class="form-label px-2" style="color: #198754;" >Email*:</span>
          <input type="text"   class="form-control" id="" name="email" required>
          <span class="form-label px-2" style="color: #198754;" >Password*:</span>
          <input type="password"  placeholder=" Nhập Mật Khẩu" class="form-control" id="" name="password" required>
          <button class="btn  mt-2 px-3 text-white" style="background-color: #198754;" >Register</button> 
          
     </form>
     @if (Session::has('message'))
<div class="alert alert-danger">
    {{Session::get('message')}}
</div>
    @php
      Session::forget('message');
    @endphp
@endif
      </div>
      <div class="d-flex justify-content-center p-lg-0  "  >
          <a href="{{route('login')}}" class=" nav-link px-5 p-2  " style="color:#198754"> Login
          </a>
          <a href="" class=" nav-link px-5 p-2  " style="height: 48px;color:#198754 " > Quên Mật Khẩu
              
          </a>
        </div>
        
     </div> 


@endsection