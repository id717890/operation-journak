<?php

use Illuminate\Database\Seeder;

class NpsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*Add roles*/
        DB::table('dir_nps')->delete();
        DB::table('dir_nps')->insert([
            'id' => 1,
            'caption' => 'НПС "Ягодное"',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_nps')->insert([
            'id' => 2,
            'caption' => 'НПС "Сосновка"',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_nps')->insert([
            'id' => 3,
            'caption' => 'НПС "Красноленинское"',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_nps')->insert([
            'id' => 4,
            'caption' => 'НПС "Конда 1"',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_nps')->insert([
            'id' => 5,
            'caption' => 'НПС "Конда 2"',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
    }
}
