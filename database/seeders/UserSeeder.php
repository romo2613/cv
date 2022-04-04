<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->username = 'romo2613';
        $user->name = 'Javier Romero';
        $user->company_name = 'JR';
        $user->email = 'javi.romero2613@gmail.com';
        $user->password = bcrypt('12345678');
        $user->save();

        $user->assignRole('admin');

        //creamos 100 usuarios de prueba
        User::factory()->count(100)->create();
    }
}
