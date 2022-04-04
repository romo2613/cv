<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\TemporalPassword;

class TemporalPasswordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            //helper para crear contraseñas temporales
            $pass = random_password();
            //gurdado de la contraseña temporal
            $newTempPass = new TemporalPassword;
            $newTempPass->password = $pass;
            $newTempPass->user_id = $user->id;
            $newTempPass->save();

            $user->password = bcrypt($pass);
            $user->save();

        }
    }
}
