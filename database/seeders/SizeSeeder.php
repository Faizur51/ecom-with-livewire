<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes=[
            'L','M','XL','S','2XL','XS'
        ];

        foreach ($sizes as $key=>$value){
            Size::create([
                'name'=>$value,
                'slug'=>Str::slug($value,'-'),
                'status'=>rand(1,0),
            ]);
        }
    }
}
