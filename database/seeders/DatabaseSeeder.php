<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            CategorySeeder::class,
            BrandSeeder::class,
            ColorSeeder::class,
            SizeSeeder::class,
            ProductSeeder::class,
            HomeSliderSeeder::class,
            DistrictSeeder::class,
        ]);

        \App\Models\User::factory(2)->sequence(['name' => 'Admin'],['name' => 'User'])->sequence(['email' => 'admin@gmail.com'],['email' => 'user@gmail.com'])->sequence(['phone' => '01717578265'],['phone' => '01915494438'])->create();

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


    }
}
