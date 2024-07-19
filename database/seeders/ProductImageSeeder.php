<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductImage::insert([
            [
                "image"=>"product-1.png",
                "product_id"=>1
            ],
            [
                "image"=>"spbt1.jpg",
                "product_id"=>1
            ],
            [
                "image"=>"spbt2.png",
                "product_id"=>1
            ],
            
            ]);
    }
}
