<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $randomImages =[
            'https://m.media-amazon.com/images/I/61uSHBgUGhL._AC_UL640_QL65_.jpg',
            'https://m.media-amazon.com/images/I/71nDK2Q8HAL._AC_UL640_QL65_.jpg',
            'https://ftp.esquireelectronicsltd.com/uploads/gallery/16-kg-washing-machine-13375-8380.jpg',
            'https://ftp.esquireelectronicsltd.com/uploads/gallery/4t-c70al1x1785-1727.jpg',
            'https://ftp.esquireelectronicsltd.com/uploads/gallery/sharp-microwave-oven-r-92a0v-price-in-bd-1000x10003696-2527.jpg',
            'https://static-01.daraz.com.bd/p/b7727b8dc0706d188179397b08826a34.jpg',
            'https://static-01.daraz.com.bd/p/7fbe4901178576bbf04907275a1dfe28.jpg',
            'https://static-01.daraz.com.bd/p/7126e45345f95b6344644bb2423d2bba.jpg'
        ];

        $brands=[
            'LG',
            'SAMSUNG',
            'Cannon',
            'HP',
            'DELL',
            'ACCER'
        ];

        foreach ($brands as $key=>$value){
            Brand::create([
                'name'=>$value,
                'slug'=>Str::slug($value,'-'),
                'status'=>rand(1,0),
                'image'=>$randomImages[rand(0, 7)],
                'category_id'=>rand(1,6)
            ]);
        }
    }
}
