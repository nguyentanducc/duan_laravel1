@extends('layout_admin')
@section('title')
    Sửa sản phẩm
@endsection
@section('body')
<div class="d-flex justify-content-between">
    <h3 class="mb-4">EDIT Product</h3>
    <div>
      <a href="" class="btn btn-outline-secondary rounded-0">
        <i class="far fa-long-arrow-left"></i> Back
      </a>
    </div>
  </div>
  <form class="row" action="{{route('admin.product.update',['id'=>$Sp->id])}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-md-8 mb-4">
      <div class="card rounded-0 border-0 shadow-sm mb-4">
        <div class="card-body">
          <h6 class="pb-3 border-bottom">Basic Info</h6>
          <div class="mb-3">
            <label for="name" class="form-label">Name *</label>
            <input type="text" class="form-control rounded-0" id="name" name="name" value="{{$Sp->name}}" required>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control rounded-0" id="description" name="description" rows="6" value="{{$Sp->description}}"></textarea>
          </div>
          <div class="row">
            <div class="col mb-3">
              <label for="instock" class="form-label">Instock *</label>
              <input type="number" class="form-control rounded-0" id="instock" min="0" name="instock"  value="{{$Sp->instock}}"required>
            </div>
            <div class="col mb-3">
              <label for="category" class="form-label">Category *</label>
              <div class="input-group">
                <select class="form-select rounded-0" id="category" name="category_id" value="category_id" required>
                    @foreach ($dsDm as $dm)
                    
                    <option value="{{$dm->id}}">{{$dm->name}}</option>     
                    @endforeach
                  
                </select>
                <button type="button" class="btn btn-outline-primary rounded-0">
                  <i class="fal fa-boxes"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card rounded-0 border-0 shadow-sm">
        <div class="card-body">
          <h6 class="pb-3 border-bottom">Price</h6>
          <div class="row">
            <div class="col mb-3">
              <label for="price" class="form-label">Price *</label>
              <input type="number" class="form-control rounded-0" id="price" min="0" name="price" value="{{($Sp->price)}}" required>
            </div>
            <div class="col mb-3">
              <label for="sale_price" class="form-label">Sale Price</label>
              <input type="number" class="form-control rounded-0" id="sale_price" min="0" name="sale_price" value="{{($Sp->sale_price)}}">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="card rounded-0 border-0 shadow-sm">
        <div class="card-body">
          <h6 class="pb-3 border-bottom">Image</h6>
          <div class="mb-3">
            <label for="image" class="form-label">Product Image *</label>
            <input class="form-control rounded-0" type="file" id="image" name="image">
            <div class="bg-secondary-subtle mb-3 p-2 text-center">
              <img src="{{asset('/')}}images/{{$Sp->image}}" class="w-50">
            </div>
          </div>
          <div class="mb-3">
            
        </div>
      </div>
      <button type="submit" class="btn btn-primary btn-lg rounded-0 mt-4 w-100">Edit Product</button>
    </div>
  </form>
@endsection
@section('script')
<script>
    var imgInp = document.querySelector('#image');
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if(file){
            document.querySelector('#image+div img').src = URL.createObjectURL(file)
        }
    }
  
</script>
<script>
      var imgs = document.querySelector('#images');
    imgs.onchange = evt => {
        const [file] = imgs.files
        if(file){
            document.querySelector('#images+div img').src = URL.createObjectURL(file)
        }
    }
    const img = (src) => `<img src=${src} width="50px"/>`;

      var loadFile = function (event) {
        var images = document.getElementById('images');
        images.innerHTML = '';

        [...event.target.files].forEach(
          (file) => (images.innerHTML += img(URL.createObjectURL(file)))
        );
      };
</script>
@endsection