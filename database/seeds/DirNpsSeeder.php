<?php

use Illuminate\Database\Seeder;

class DirNpsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*НПС*/
        DB::table('dir_global')->insert([
            'dir_type_id' => 2,
            'caption' => 'Ильичевка',
            'group_name' => 'Нефтеперкачивающие станции',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 2,
            'caption' => 'Катыш',
            'group_name' => 'Нефтеперкачивающие станции',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 2,
            'caption' => 'Конда-1',
            'group_name' => 'Нефтеперкачивающие станции',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 2,
            'caption' => 'Конда-2',
            'group_name' => 'Нефтеперкачивающие станции',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 2,
            'caption' => 'Конда-3',
            'group_name' => 'Нефтеперкачивающие станции',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 2,
            'caption' => 'Березовое-1',
            'group_name' => 'Нефтеперкачивающие станции',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 2,
            'caption' => 'Березовое-2',
            'group_name' => 'Нефтеперкачивающие станции',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 2,
            'caption' => 'Крутое',
            'group_name' => 'Нефтеперкачивающие станции',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 2,
            'caption' => 'Сосьва-1',
            'group_name' => 'Нефтеперкачивающие станции',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 2,
            'caption' => 'Сосьва-2',
            'group_name' => 'Нефтеперкачивающие станции',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 2,
            'caption' => 'Сосновка',
            'group_name' => 'Нефтеперкачивающие станции',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
    }
}
