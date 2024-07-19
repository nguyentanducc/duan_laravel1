<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::insert([
            [
                'user_id'=>10,
                'product_id'=>1,
                'content'=>'Cái này xịn nha !Giá rẻ',
                'created_at'=>now()
                
            ],
            [
                'user_id'=>10,
                'product_id'=>1,
                'content'=>'Cũng Được  Pro vip',
                'created_at'=>now()

                
            ]
            
            ]);
    }
}
