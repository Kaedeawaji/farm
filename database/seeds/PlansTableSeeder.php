<?php

use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plans')->insert([
            'name' => 'サンプルプラン',
            'price' => 3000,
            'detail' => '詳細サンプル',
        ]);
    }
}
