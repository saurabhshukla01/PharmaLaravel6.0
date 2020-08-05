<?php

use Illuminate\Database\Seeder;
use App\ProductsImage;

class ProductsImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productImageRecords = [
        	['id'=>1,'product_id'=>1,'image'=>'shopping.png-9804463.png','status'=>1],
        	['id'=>2,'product_id'=>2,'image'=>'Restaurant-Blog-Events.png-5177805.png','status'=>1],
        ];
        
        ProductsImage::insert($productImageRecords);
    }
}
