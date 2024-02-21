<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $randomImages =[
            'https://m.media-amazon.com/images/I/71kcJ78kdPL._AC_SL1500_.jpg',
            'https://m.media-amazon.com/images/I/61B+tCqptWL._AC_SL1500_.jpg',
            'https://m.media-amazon.com/images/I/61CqYq+xwNL._AC_UL640_QL65_.jpg',
            'https://m.media-amazon.com/images/I/71cVOgvystL._AC_UL640_QL65_.jpg',
            'https://m.media-amazon.com/images/I/71E+oh38ZqL._AC_UL640_QL65_.jpg',
            'https://m.media-amazon.com/images/I/61uSHBgUGhL._AC_UL640_QL65_.jpg',
            'https://m.media-amazon.com/images/I/71nDK2Q8HAL._AC_UL640_QL65_.jpg',
            'https://ftp.esquireelectronicsltd.com/uploads/gallery/16-kg-washing-machine-13375-8380.jpg',
            'https://ftp.esquireelectronicsltd.com/uploads/gallery/4t-c70al1x1785-1727.jpg',
            'https://ftp.esquireelectronicsltd.com/uploads/gallery/sharp-microwave-oven-r-92a0v-price-in-bd-1000x10003696-2527.jpg',
            'https://static-01.daraz.com.bd/p/b7727b8dc0706d188179397b08826a34.jpg',
            'https://static-01.daraz.com.bd/p/7fbe4901178576bbf04907275a1dfe28.jpg',
            'https://static-01.daraz.com.bd/p/7126e45345f95b6344644bb2423d2bba.jpg',
            'https://ftp.esquireelectronicsltd.com/uploads/gallery/sharp-chest-freezer-sjc-118-wh-price-in-bd-1000x10003198-5987.jpg',
            'https://ftp.esquireelectronicsltd.com/uploads/gallery/sharp-microwave-oven-r-94a0v-price-in-bd-1000x1000920-2527.jpg',
            'https://ftp.esquireelectronicsltd.com/uploads/gallery/sm-3006-toaster-waffle-maker-grill-morphy-richards-22487-0672.jpg',
            'https://ftp.esquireelectronicsltd.com/uploads/gallery/aero-new3494-8501.jpg'
        ];

        $color=[
            'green','white','yellow','red','cyan','grey'
        ];


        $size=[
            'S','M','L','XL','2XL'
        ];


        foreach (range(1,100) as $key=>$value){
            $name=$faker->unique(true)->words($nb=4,$asText=True);
            Product::create([
                'name'=>$name,
                'slug'=>Str::slug($name,'-'),
                'short_description'=>$faker->text(100),
                'long_description'=>$faker->text(150),
                'sku_code'=>'PRO'.$faker->unique()->numberBetween(100,500),
                'stock_status'=>rand(1,0),
                'regular_price'=>$faker->numberBetween(500,1000),
                'sale_price'=>$faker->numberBetween(100,499),
                'quantity'=>$faker->numberBetween(10,50),
                'color'=>json_encode($color),
                'size'=>json_encode($size),
                //'size'=>$size[rand(0,5)],
                'image'=>$randomImages[rand(0, 15)],
                'images'=>json_encode($randomImages),
                'category_id'=>$faker->numberBetween(1,6),
                'brand_id'=>$faker->numberBetween(1,6),
                'status'=>rand(1,0),
            ]);
        }


    }
}
