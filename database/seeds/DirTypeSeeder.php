<?php

use Illuminate\Database\Seeder;

class DirTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*Add dir type*/
        DB::table('dir_types')->delete();
        DB::table('dir_types')->insert([
            'id' => 1,
            'caption' => 'МН',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_types')->insert([
            'id' => 2,
            'caption' => 'НПС',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_types')->insert([
            'id' => 3,
            'caption' => 'ЛУ',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_types')->insert([
            'id' => 4,
            'caption' => 'КП',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_types')->insert([
            'id' => 5,
            'caption' => 'СИКН',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
    }
}
