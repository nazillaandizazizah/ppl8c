<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new Role();
        $data->name = 'peternak';
        $data->save();

        $data = new Role();
        $data->name = 'dokter';
        $data->save();

        $data = new Role();
        $data->name = 'admin';
        $data->save();
    }
}
