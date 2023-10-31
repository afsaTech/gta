<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{

    $names=array("Adult","Child","Couple");

   
    // Seed 3 Categories with sample data
    // for ($i = 1; $i<=3; $i++) {

       foreach($names as $name){
        DB::table('categories')->insert([
            'name' =>$name , 
            'created_at' => now(),
        ]);
       }
        
        
    // }
}
}

