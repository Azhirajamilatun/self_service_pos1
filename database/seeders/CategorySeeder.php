<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
    $faker = Faker::create('id_ID');
    for ($i=1; $i <= 100; $i++) { 
        \DB::table('siswas')->insert([
            'name'=>$faker->name,
            'category_id'=>$faker->numberBetween(1, 4),
            'price'=>$faker->numberBetween(100, 100000),
            'desc'=>$faker->paragraph($nbSentences = $variableNBSentences),
            'image'=> '/storage/images/product.jpg',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
    }
}
}