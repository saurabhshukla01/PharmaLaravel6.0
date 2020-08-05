<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productRecords = [
        	['id'=>1,'category_id'=>1,'section_id'=>1,'product_name'=>'Blue-T-shirt','product_code'=>'BT001','product_color'=>'Blue','product_price'=>1500,'product_discount'=>10,'product_weight'=>200,'product_video'=>'','main_image'=>'','description'=>'Test Product','wash_care'=>'','fabric'=>'','pattern'=>'','sleeve'=>'','fit'=>'','occassion'=>'','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','is_featured'=>'No','status'=>1],
        	['id'=>2,'category_id'=>2,'section_id'=>2,'product_name'=>'White-Top','product_code'=>'TC001','product_color'=>'White','product_price'=>2500,'product_discount'=>15,'product_weight'=>240,'product_video'=>'','main_image'=>'','description'=>'Test Product Level','wash_care'=>'','fabric'=>'','pattern'=>'','sleeve'=>'','fit'=>'','occassion'=>'','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','is_featured'=>'No','status'=>1],
        	['id'=>3,'category_id'=>4,'section_id'=>1,'product_name'=>'Red Casual T-shirts','product_code'=>'CT001','product_color'=>'Red','product_price'=>1250,'product_discount'=>12.5,'product_weight'=>300,'product_video'=>'','main_image'=>'','description'=>'Test Product Level','wash_care'=>'','fabric'=>'','pattern'=>'','sleeve'=>'','fit'=>'','occassion'=>'','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','is_featured'=>'No','status'=>1],
        ];

        Product::insert($productRecords);
    }
}
