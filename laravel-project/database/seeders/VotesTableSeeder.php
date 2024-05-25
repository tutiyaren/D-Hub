<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VotesTableSeeder extends Seeder
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
            'vote_type' => 'agree'
        ];
        Db::Table('votes')->insert($param);
        $param = [
            'anonymity_id' => '1',
            'debate_id' => '2',
            'vote_type' => 'disagree'
        ];
        Db::Table('votes')->insert($param);
        $param = [
            'anonymity_id' => '1',
            'debate_id' => '4',
            'vote_type' => 'agree'
        ];
        Db::Table('votes')->insert($param);
        $param = [
            'anonymity_id' => '1',
            'debate_id' => '8',
            'vote_type' => 'disagree'
        ];
        Db::Table('votes')->insert($param);
        $param = [
            'anonymity_id' => '2',
            'debate_id' => '1',
            'vote_type' => 'disagree'
        ];
        Db::Table('votes')->insert($param);
        $param = [
            'anonymity_id' => '2',
            'debate_id' => '3',
            'vote_type' => 'agree'
        ];
        Db::Table('votes')->insert($param);
        $param = [
            'anonymity_id' => '2',
            'debate_id' => '6',
            'vote_type' => 'disagree'
        ];
        Db::Table('votes')->insert($param);
        $param = [
            'anonymity_id' => '2',
            'debate_id' => '8',
            'vote_type' => 'agree'
        ];
        Db::Table('votes')->insert($param);
    }
}
