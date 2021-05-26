<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin();
        $admin->email_admin = "admin@email.com";
        $admin->phone_admin = "+5584911111111";
        $admin->name_admin = "admin";
        $admin->password_admin = "12345";

        $admin->save();
    }
}
