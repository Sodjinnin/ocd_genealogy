<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "name" => "John Doe",
                "email" => "johndoe@gmail.com",
                "email_verified_at" => date('Y-m-d H:m:i'),
                "password" => bcrypt("12345678"),
            ],

        ];

        foreach ($data as $item) {
            User::updateOrCreate(
                [
                    "email"=>$item['email']
                ],
                $item
            );
        }
    }
}
