<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $peternak = Role::where('name', 'peternak')->first();
        $dokter = Role::where('name', 'dokter')->first();
        $admin = Role::where('name', 'admin')->first();

        $data = new User();
        $data->name = 'peternak';
        $data->email = 'peternak@gmail.com';
        $data->password = bcrypt('rahasia');
        $data->save();
        $data->roles()->attach($peternak);

        $data = new User();
        $data->name = 'dokter';
        $data->email = 'dokter@gmail.com';
        $data->password = bcrypt('rahasia');
        $data->save();
        $data->roles()->attach($dokter);

        $data = new User();
        $data->name = 'admin';
        $data->email = 'admin@gmail.com';
        $data->password = bcrypt('rahasia');
        $data->save();
        $data->roles()->attach($admin);
    }
}
