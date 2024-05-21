<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
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
            'contents' => 'サンプルテキストサンプルテキスト',
        ];
        Db::Table('comments')->insert($param);
        $param = [
            'anonymity_id' => '2',
            'debate_id' => '1',
            'contents' => 'サンプル',
        ];
        Db::Table('comments')->insert($param);
        $param = [
            'anonymity_id' => '1',
            'debate_id' => '1',
            'contents' => 'サンプルテキスト',
        ];
        Db::Table('comments')->insert($param);
        $param = [
            'anonymity_id' => '2',
            'debate_id' => '1',
            'contents' => 'サ',
        ];
        Db::Table('comments')->insert($param);
        $param = [
            'anonymity_id' => '2',
            'debate_id' => '1',
            'contents' => 'サン',
        ];
        Db::Table('comments')->insert($param);
        $param = [
            'anonymity_id' => '1',
            'debate_id' => '1',
            'contents' => 'サンプルテキストサンプルテキスト',
        ];
        Db::Table('comments')->insert($param);
        $param = [
            'anonymity_id' => '2',
            'debate_id' => '7',
            'contents' => 'サンプル',
        ];
        Db::Table('comments')->insert($param);
        $param = [
            'anonymity_id' => '1',
            'debate_id' => '7',
            'contents' => 'サンプルテキストサンプルテキストサンプルテキスト',
        ];
        Db::Table('comments')->insert($param);
        $param = [
            'anonymity_id' => '2',
            'debate_id' => '2',
            'contents' => 'サン',
        ];
        Db::Table('comments')->insert($param);
        $param = [
            'anonymity_id' => '2',
            'debate_id' => '4',
            'contents' => 'サンプルテキストサンプルテキストサンプルテキストsampletext',
        ];
        Db::Table('comments')->insert($param);
    }
}
