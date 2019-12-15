<?php

use Illuminate\Database\Seeder;
// use RolesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SaldosTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
    }
}
