<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new Client();
        $client->email_client = "cliente@email.com";
        $client->phone_client = "+5584933333333";
        $client->name_client = "cliente";
        $client->password_client = "12345";

        $client->save();
    }
}
