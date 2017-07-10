<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestTbableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //数据库操作
        DB::table('student')->insert([
            ['name'=>'tianchong','age'=>18],
            ['name'=>'tianchong1','age'=>28],
            ['name'=>'tianchong3','age'=>25]
        ]);
    }
}
