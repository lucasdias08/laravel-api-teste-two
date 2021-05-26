<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product();
        $product->name_product = "Coxinha";
        $product->description_product = "Coxinha de frango";
        $product->price_product = 20;
        $product->id_category_fk = 1;

        $product->save();
        
        //

        $product2 = new Product();
        $product2->name_product = "Pudim";
        $product2->description_product = "Pudim caseiro";
        $product2->price_product = 10;
        $product2->id_category_fk = 2;

        $product2->save();
    }
}
