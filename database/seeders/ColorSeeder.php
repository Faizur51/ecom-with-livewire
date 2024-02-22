<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors=[
            'green','white','yellow','red','cyan','purple'
        ];

        foreach ($colors as $key=>$value){
            Color::create([
                'name'=>$value,
                'slug'=>Str::slug($value,'-'),
                'status'=>rand(1,0),
            ]);
        }
    }
}
