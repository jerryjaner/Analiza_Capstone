<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'Admin',
               'address'=>'Admin Address',
               'cp'=>'12345678919',
               'email'=>'admin@example.com',
                'role'=>'1',
                'verification' => '1',
               'password'=> bcrypt('123456'),
            ],
            [
               'account_no'=>'011-22-83120',
               'name'=>'Customer',
               'address'=>'Customer Address',
               'cp'=>'12345678919',
               'email'=>'customer@example.com',
                'role'=>'0',
                'verification' => '1',
               'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Staff',
                'address'=>'Staff Address',
                'cp'=>'12345678919',
                'email'=>'staff@example.com',
                 'role'=>'3',
                 'verification' => '1',
                'password'=> bcrypt('123456'),
             ],
             [
                'name'=>'Techinician',
                'address'=>'Techinician Address',
                'cp'=>'12345678919',
                'email'=>'technician@example.com',
                 'role'=>'2',
                 'verification' => '1',
                 'is_Online' => '1',
                'password'=> bcrypt('123456'),
             ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
