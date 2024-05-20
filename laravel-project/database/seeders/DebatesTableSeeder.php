<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DebatesTableSeeder extends Seeder
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
            'genre_id' => '1',
            'title' => 'テスト',
            'contents' => 'サンプルテキストサンプルテキスト',
        ];
        Db::Table('debates')->insert($param);
        $param = [
            'anonymity_id' => '1',
            'genre_id' => '1',
            'title' => 'テストテストテストテストテストテストテストテスト',
            'contents' => 'サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト',
        ];
        Db::Table('debates')->insert($param);
        $param = [
            'anonymity_id' => '1',
            'genre_id' => '2',
            'title' => 'テストテストテスト',
            'contents' => 'サンプルテキストサンプルテキスト',
        ];
        Db::Table('debates')->insert($param);
        $param = [
            'anonymity_id' => '1',
            'genre_id' => '3',
            'title' => 'テ',
            'contents' => 'サンプルテキストサンプルテキスト',
        ];
        Db::Table('debates')->insert($param);
        $param = [
            'anonymity_id' => '1',
            'genre_id' => '4',
            'title' => 'テストテストテストテストテストテストテスト',
            'contents' => 'サンプルテキストサンプルテキスト',
        ];
        Db::Table('debates')->insert($param);
        $param = [
            'anonymity_id' => '2',
            'genre_id' => '1',
            'title' => 'テストテストテストテストテストテストテストテストテストテスト',
            'contents' => 'サンプル',
        ];
        Db::Table('debates')->insert($param);
        $param = [
            'anonymity_id' => '2',
            'genre_id' => '1',
            'title' => 'テストテストテストテストテストテスト',
            'contents' => 'サンプル',
        ];
        Db::Table('debates')->insert($param);
        $param = [
            'anonymity_id' => '2',
            'genre_id' => '2',
            'title' => 'テスト',
            'contents' => 'サンプルテキストサンプルテキストサンプルテキストサンプルテキスト',
        ];
        Db::Table('debates')->insert($param);
        $param = [
            'anonymity_id' => '2',
            'genre_id' => '2',
            'title' => 'テストテストテスト',
            'contents' => 'サンプル',
        ];
        Db::Table('debates')->insert($param);
        $param = [
            'anonymity_id' => '2',
            'genre_id' => '2',
            'title' => 'テストテストテストテスト',
            'contents' => 'サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト',
        ];
        Db::Table('debates')->insert($param);
        $param = [
            'anonymity_id' => '2',
            'genre_id' => '3',
            'title' => 'テストテストテスト',
            'contents' => 'サンプルテキスト',
        ];
        Db::Table('debates')->insert($param);
        $param = [
            'anonymity_id' => '2',
            'genre_id' => '4',
            'title' => 'テストテストテストテストテストテストテストテスト',
            'contents' => 'サンプルテキストサンプルテキストサンプルテキストサンプルテキスト',
        ];
        Db::Table('debates')->insert($param);
    }
}
