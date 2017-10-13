<?php

use Illuminate\Database\Seeder;

class DirLuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*ЛУ*/
        DB::table('dir_global')->insert([
            'dir_type_id' => 3,
            'caption' => 'Катыш-Конда',
            'group_name' => 'Линейные участки',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 3,
            'caption' => 'Конда-Ягодное',
            'group_name' => 'Линейные участки',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 3,
            'caption' => 'Ягодное-Березовое',
            'group_name' => 'Линейные участки',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
    }
}
