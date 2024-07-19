@extends('layout')
@section('title')
    {{$sp->name}}
@endsection
@section('body')
<h2 class="text-center fw-bold  p-2" style="color: #198754;">{{$sp->name}}</h2>
  
<div class="row justify-content-sm-start  p-5 ">
  <div class="col-3 mt-4">
      
      <div class=" border  rounded overflow-hidden mt-3 mb-3  position-relative" >
         
        <div id="#product-images" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#product-images" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#product-images" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#product-images" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{asset('/')}}images/{{$sp->image}}" class="d-block w-100" alt="...">
              </div>
              @foreach ($sp->images as $item)
              <div class="carousel-item">
                <img src="{{asset('/')}}images/img2/{{$item->image}}" class="d-block w-100" alt="...">
              </div>
              @endforeach
              
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#product-images" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#product-images" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
            
          </div>
          {{-- <div class="bg-light d-flex justify-content-center align-items-center  position-relative" >
            
              <img  class="mh-100 mw-100" src=" {{asset('/')}}images/{{$sp->image}}" alt="">
          </div>  --}}
          
          
  </div>
  
  </div>
  <div class="col-5 mt-5 ">
      <div class="p-2 text-star">
          <!-- Khu vực tên sản phẩm -->
          <h1 class="h2 " style="height: 48px;">{{$sp->name}}</h1>
          <p>{{$sp->description}}</p>
          <!-- Khu vực giá -->
          <div class="text-dark">Giá : {{number_format($sp->price)}}VNĐ</div>
          <div> Số Lượng: 
          <input min="1" max="{{$sp->instock}}" value="1" type="number" ng-model="quantity">
         {{-- <a href="cart.html"> --}}
          <button  ng-click="addToCart({{$sp->id}},quantity)" class="btn" style="background-color:#198754 ;"> ADD TO CART</button></div>
        {{-- </a> --}}
         
       
          <!-- Khu vực button tương tác -->
          
      </div>
  </div>    
 
     </div> 
     <div class="row justify-content-sm-start  p-5">
        <div class="col-5 mt-4 d-flex p-1 ">
            <div class=" bg-light border rounded overflow-hidden d-flex justify-content-center align-items-center" style="width: 60px; height: 60px; ">
                <img  data-bs-target="#product-images" data-bs-slide-to="0" class="mh-100 mw-100" src="{{asset('/')}}images/{{$sp->image}}" >
            </div>
         
            @php
                $i=1;
            @endphp
                @foreach ($sp->images as $item)
                <div class=" bg-light border rounded overflow-hidden d-flex justify-content-center align-items-center" style="width: 60px; height: 60px; ">
                    <img  data-bs-target="#product-images" data-bs-slide-to="{{$i++}}" class="mh-100 mw-100" src="{{asset('/')}}images/img2/{{$item->image}}" >
                </div>
                @endforeach
               
                
            </td>
     
     
            
            
            
    </div>
    
    </div>
     <div class="row ps-5">
      <div class="col-5 mt-3">
        <div class="border rounded overflow-hidden mt-3 mb-3">
          <h5 class="ps-3">Comments</h5>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Content</th>
                <th>User</th>
                <th>Time</th>
              </tr>
            </thead>
          </table>
          <table class="table table-hover" ng-repeat="bl in dsBL">
            
            <tbody>
              
              <tr>
                <th>@{{bl.content}}</th>
                <th>@{{bl.user_fullname}}</th>
                <th>@{{bl.created_at | date:'dd/MM/yyyy'}}</th>
              </tr>
            </tbody>
            
          </table>
          @auth
          <form action="">
            <textarea  class="form-control" ng-model="content" cols="20" rows="10"></textarea>
            <button type="submit" ng-click="sendComment()">Send</button>
          </form> 
          @endauth
          @guest
              <div class="alert alert-info">
                Bạn cần đăng nhập để đánh giá
              </div>
          @endguest
          
        </div>
      </div>
     </div>
@endsection
@section('viewFunction')
<script>
  viewFunction = function($scope,$http){
    $scope.quantity = 1;  
    $scope.dsBL= [];
    $scope.getComment= function(){
      $http.get('/api/comments/product/{{$sp->id}}').then(
      function(res){// thanh cong
        $scope.dsBL = res.data.data;
        console.log($scope.dsBL);
      },
      function(res){//that bai

      }
    );
    }
    $scope.getComment();

    $scope.sendComment= function(){
      $http.post('/api/comments',{
        'product_id':{{$sp->id}},
        'content':$scope.content,
      }).then(
        function(res){
          $scope.content='';
          $scope.getComment();
        }
      )
    }

  }
</script>
    
@endsection