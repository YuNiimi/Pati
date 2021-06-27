<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class SlotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slots')->insert([
            'store_id' => 1,
            'sis' => "1365",
            'name' => "マイジャグラーⅢKD",
            'name_encode' => "%A5%DE%A5%A4%A5%B8%A5%E3%A5%B0%A5%E9%A1%BC%AD%B7KD",
        ]);
    }
}
