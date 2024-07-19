@extends('layout')
@section('title')
    Đăng nhập
@endsection
@section('body')
<h2 class="text-center fw-bold p-2" style="color: #198754;">LOGIN </h2>
  
<div class="row justify-content-center p-2">
  <div class="col-sm-4 col-md-4  p-4 px-xl-5 " >

      <form action="#"  method="post">
      @csrf
          <span class="form-label px-2" style="color: #198754;"> Email *:</span>
          <input type="text"  placeholder="Nhập Tên Tài Khoản " class="form-control" name="email" required>
          <span class="form-label px-2" style="color:#198754;" >Password*:</span>
          <input type="password"  placeholder=" Nhập Mật Khẩu" class="form-control" name="password" required>
          <button class="btn text-white mt-2 px-3" style="background-color: #198754;">Login</button> 
     </form>
     @if (Session::has('message'))
     <div class="alert alert-danger p-2">
         {{Session::get('message')}}
     </div>
         @php
           Session::forget('message');
         @endphp
     @endif
      </div>
      <div class="d-flex justify-content-center p-lg-0  "  >
          <a href="{{route('register')}}" class=" nav-link px-5 p-2  " style="color:#198754"> Đăng Ký
          </a>
          <a href="" class=" nav-link px-5 p-2  " style="height: 48px;color:#198754" > Quên Mật Khẩu
              
          </a>
          
        </div>

     </div> 
@endsection