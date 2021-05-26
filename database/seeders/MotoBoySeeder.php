<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MotoBoy;

class MotoBoySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $motoBoy = new MotoBoy();
        $motoBoy->email_motoBoy = "motoboye@email.com";
        $motoBoy->phone_motoBoy = "+5584922222222";
        $motoBoy->name_motoBoy = "motoboy";
        $motoBoy->password_motoBoy = "12345";
        $motoBoy->id_admin_fk = 1;

        $motoBoy->save();
    }
}
