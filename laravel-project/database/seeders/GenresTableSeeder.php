<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '政治'
        ];
        Db::Table('genres')->insert($param);
        $param = [
            'name' => '経済'
        ];
        Db::Table('genres')->insert($param);
        $param = [
            'name' => '国際'
        ];
        Db::Table('genres')->insert($param);
        $param = [
            'name' => '社会'
        ];
        Db::Table('genres')->insert($param);
    }
}
