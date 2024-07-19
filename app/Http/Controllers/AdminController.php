<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Str;
class AdminController extends Controller
{
    public function dashboard(){
        $sodonHang = Order::count();
        $soSanPham = Product::count();
        $soKhachHang = User::where('role','user')->count();
        $doanhThu = Order::where('status','success')->sum('total_money');
        $dsDh = Order::orderBy('created_at','DESC')->limit(5)->get();
        $dsBl = Comment::orderBy('created_at','DESC')->limit(5)->get();
        $tkdoanhThu = Order::where('status','success')->groupByRaw('YEAR(created_at),MONTH(created_at) ')->selectRaw('YEAR(created_at) as year,MONTH(created_at) as moth,SUM(total_money) as total')->get();

        return view('admin.dashboard',compact('sodonHang','soSanPham','soKhachHang','doanhThu','dsDh','dsBl','tkdoanhThu'));
    }
    public function product(){
        $dsSp=Product::paginate(10);
        $soSp=Product::count();
        $soSaphet=Product::where('instock','<=',20)->count();
        $soDM=Category::count();
        return view('admin.product',compact('dsSp','soSp','soSaphet','soDM'));
    }
    public function productAdd(){
        $dsDm=Category::get();
        return view('admin.product_add',compact('dsDm'));
    }
    public function postproductAdd(Request $request){
        //validate
        $product = new Product();
        $product->name = $request->name;
        $product->slug= Str::slug($request->name);
        $product->description = $request->description;
        $product->instock = $request->instock;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->image = '';
        $product->save();
        //upload ảnh
        if($request->hasFile('image')){
            $img = $request->file('image');
            $imgName ="{$product->id}.{$img->getClientOriginalExtension()}";
            $img->move(public_path('images/'),$imgName);
            $product->image = $imgName;
            $product->save();
        }
        if($request->hasFile('images')){
            $imgList = $request->file('images');
            foreach($imgList as $key =>$img){
                $imgName ="{$product->id}.{$key}.{$img->getClientOriginalExtension()}";
                $img->move(public_path('images/'),$imgName);
                $product->image = $imgName;
                $product->save();
                $productImage = new ProductImage();
                $productImage->image = $imgName;
                $productImage->product_id = $product->id;
                $productImage->save();
            }
            
        }
        return redirect()->route('admin.product');
    }
    public function productEdit($id){
        $Sp = Product::find($id);
        $dsDm=Category::get();
        return view('admin.product_edit',compact('Sp','dsDm'));
    }
    public function productDetail($id){
        $Sp = Product::find($id);
        $dsDm=Category::get();
        return view('admin.product_detail',compact('Sp','dsDm'));
    }
    public function update(Request $request,$id){
        $Sp = Product::find($id);
        $Sp->name = $request->input('name');
        $Sp->Description = $request->input('Description');
        $Sp->instock = $request->input('instock');
        $Sp->category_id = $request->input('category_id');
        $Sp->price = $request->input('price');
        $Sp->sale_price = $request->input('sale_price');
        if($request->hasFile('image')){
            //nếu trước đó không có ảnh cũ thì ko xóa
            $imgOld="images/".$Sp->image;
            if(FacadesFile::exists($imgOld)){
                FacadesFile::delete($imgOld);
            }
            $img = $request->file('image');
            $imgName ="{$Sp->id}.{$img->getClientOriginalExtension()}";
            $img->move(public_path('images/'),$imgName);
            $Sp->image = $imgName;
            $Sp->save();
        }
        return redirect()->route('admin.product');

    }
    public function delete($id){
        $product = Product::find($id);
        $imgOld="images/".$product->image;
            if(FacadesFile::exists($imgOld)){
                FacadesFile::delete($imgOld);
            }
        $product ->delete();
        return redirect()->route('admin.product');

    }
    public function user(){
        $dsU = User::limit(5)->get();
        return view('admin.customers.user',compact('dsU'));
    }
    public function editUser($id){
        $dsU = User::find($id);
        return view('admin.customers.user_edit',compact('dsU'));
    }
    public function updateUser(Request $requet,$id){
        $User = User::find($id);
        $User->name = $requet->input('name');
        $User->email = $requet->input('email');
        $User->phone = $requet->input('phone');
        $User->address = $requet->input('address');
        $User->role = $requet->input('role');
        $User->save();
        return redirect()->route('admin.user');

    }
    public function deleteUser(){

    }
    public function order(){
        $dsU = Order::get();
        return view('admin.order.oder',compact('dsU'));
    }
}
