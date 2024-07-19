<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    
    {
        $dsSp =
            [ [
                "name"=>"Ghế Công Thái Học1",
                "image"=>"product-1.png",
                "instock"=>rand(10,50),
                "category_id"=>1,
                "price"=> 1000000,
                "sale_price"=>999999
            ],
            [
                "name"=>"Ghế Công Thái Học 2",
                "image"=>"product-2.png",
                "instock"=>rand(10,50),
                "category_id"=>2,
                "price"=> 1000000,
                "sale_price"=>999999
            ],
            [
                "name"=>"Ghế Công Thái Học 3 ",
                "image"=>"product-3.png",
                "instock"=>rand(10,50),
                "category_id"=>3,
                "price"=> 1000000,
                "sale_price"=>999999
            ],
            [
                "name"=>"Ghế Công Thái Học 4 ",
                "image"=>"product-2.png",
                "instock"=>rand(10,50),
                "category_id"=>4,
                "price"=> 1000000,
                "sale_price"=>999999
            ]
        ]
        ;
        foreach($dsSp as $sp){
            Product::create([
                "name"=>$sp['name'],
                "slug"=>Str::slug($sp['name']),
                "image"=>$sp['image'],
                "instock"=>$sp['instock'],
                "category_id"=>$sp['category_id'],
                "price"=> $sp['price'],
                "sale_price"=>$sp['sale_price']
            ]);
        }
    }
}
