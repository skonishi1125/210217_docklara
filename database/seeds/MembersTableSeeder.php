<?php

use Illuminate\Database\Seeder;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('members')->insert([
            [
                'name' => 'ゴンベイ',
                'email' => 'gonbei@gmail.com',
                'password' => 'gonbei1234',
                'picture' => 'gonbei.png',
            ],
            [
                'name' => 'タツロー',
                'email' => 'tatsuro@gmail.com',
                'password' => 'tatsuro1234',
                'picture' => 'tatsuro.png',
            ],
            [
                'name' => 'ひろゆき',
                'email' => 'hiroyuki@gmail.com',
                'password' => 'hiroyuki1234',
                'picture' => 'hiroyuki.png',
            ],

        ]);
    }
}
