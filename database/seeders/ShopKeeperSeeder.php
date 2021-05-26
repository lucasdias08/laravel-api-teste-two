<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shopkeeper;

class ShopKeeperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shopkeeper = new Shopkeeper();
        $shopkeeper->email_shopkeeper = "lojista@email.com";
        $shopkeeper->phone_shopkeeper = "+5584944444444";
        $shopkeeper->name_shopkeeper = "lojista";
        $shopkeeper->password_shopkeeper = "12345";
        $shopkeeper->id_admin_fk = 1;

        $shopkeeper->save();
    }
}
