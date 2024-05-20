<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnonymitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => '1',
            'nickname' => 'aaA',
        ];
        Db::Table('anonymities')->insert($param);
        $param = [
            'user_id' => '2',
            'nickname' => 'BBb',
        ];
        Db::Table('anonymities')->insert($param);
    }
}
