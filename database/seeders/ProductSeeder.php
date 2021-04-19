<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name'=>'Pure Cotton Polo Shirt',
                'price'=>'999',
                'description'=>'This polo shirt has a simple, yet incredibly versatile design that will slip very happily into any area of your wardrobe, ready to save the day when you’re looking for quick and easy outfit options.',
                'category'=>'Tshirt',
                'brand'=>'Polo',
                'gallery'=>'https://asset1.cxnmarksandspencer.com/is/image/mands/SD_03_T28_5000M_QE_X_EC_90?$PDP_INT_IMAGEGRID_2_LG$'
            ],
            [
                'name'=>'Air Dry Merino Wool | Polo',
                'price'=>'7315',
                'description'=>'Upgrade to the new Air Dry Polo and experience the difference of 100% Merino Wool. Made with a soft and airy knit fabric that’s as durable as it is comfortable.',
                'category'=>'Tshirt',
                'brand'=>'Polo',
                'gallery'=>'https://cdn.shopify.com/s/files/1/0154/9055/products/Polo-navy_2048x.jpg?v=1602614751'
            ],
            [
                'name'=>'Air Dry Merino Wool | Polo',
                'price'=>'6995',
                'description'=>'Upgrade to the new Air Dry Polo and experience the difference of 100% Merino Wool. Made with a soft and airy knit fabric that’s as durable as it is comfortable.',
                'category'=>'Tshirt',
                'brand'=>'Polo',
                'gallery'=>'https://cdn.shopify.com/s/files/1/0154/9055/products/polo-Black_2048x.jpg?v=1602614729'
            ],
            [
                'name'=>'Polo Tshirt - Orange Grid',
                'price'=>'3490',
                'description'=>'An easy, everyday polo in a soft green hue. Cut from 100% Supima cotton (the finest in the world) and designed for everyday comfort.',
                'category'=>'Tshirt',
                'brand'=>'Polo',
                'gallery'=>'https://cdn.andamen.com/media/catalog/product/0/1/01_9_57.jpg'
            ]
        ]);
    }
}
