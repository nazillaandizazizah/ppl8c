<?php

use App\Saldo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class SaldosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new Saldo();
        $data->user_id = '1';
        $data->saldo = '100000';
        $data->save();
    }
}
