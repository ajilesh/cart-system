<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        $poroduct = [
            ['name'=>'product 1','description'=>'Description 1','price'=>200,'image'=>'product1.jpg'],
            ['name'=>'product 2','description'=>'Description 2','price'=>400,'image'=>'product2.jpg']
                ];
       foreach ($poroduct as $product) {
        \App\Models\Product::create($product);
       }
    }
}
