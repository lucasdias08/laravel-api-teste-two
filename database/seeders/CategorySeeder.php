<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name_category = "Salgado";

        $category->save();

        ///

        $category2 = new Category();
        $category2->name_category = "Doce";

        $category2->save();
    }
}
