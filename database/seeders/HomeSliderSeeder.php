<?php

namespace Database\Seeders;

use App\Models\HomeSlider;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker;
class HomeSliderSeeder extends Seeder
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
            'https://m.media-amazon.com/images/I/41WpqIvJWRL._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/61ghDjhS8vL._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/61c1QC4lF-L._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/710VzyXGVsL._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/61EPT-oMLrL._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/71r3ktfakgL._AC_UY436_QL65_.jpg',
        ];

        foreach (range(1,10) as $key=>$value){
            $top_title=$faker->unique(true)->words($nb=3,$asText=True);
            HomeSlider::create([
                'top_title'=>$top_title,
                'slug'=>Str::slug($top_title,'-'),
                'title'=>$faker->text(20),
                'sub_title'=>$faker->text(15),
                'offer'=>rand(50,70),
                'link'=>'facebook.com',
                'image'=>$randomImages[rand(0, 5)],
                'status'=>rand(1,0)
            ]);
        }


    }
}
