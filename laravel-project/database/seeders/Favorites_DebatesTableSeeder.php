<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Favorites_DebatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'anonymity_id' => '1',
            'debate_id' => '1',
        ];
        Db::Table('favorite__debates')->insert($param);
        $param = [
            'anonymity_id' => '1',
            'debate_id' => '5',
        ];
        Db::Table('favorite__debates')->insert($param);
        $param = [
            'anonymity_id' => '2',
            'debate_id' => '1',
        ];
        Db::Table('favorite__debates')->insert($param);
        $param = [
            'anonymity_id' => '2',
            'debate_id' => '2',
        ];
        Db::Table('favorite__debates')->insert($param);
    }
}
