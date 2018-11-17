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
            'caption' => 'Ильичевка-Катыш',
            'group_name' => 'Линейные участки',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
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
        DB::table('dir_global')->insert([
            'dir_type_id' => 3,
            'caption' => 'Березовое-Крутое',
            'group_name' => 'Линейные участки',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 3,
            'caption' => 'Крутое-Сосьва',
            'group_name' => 'Линейные участки',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 3,
            'caption' => 'Сосьва-Сосновка',
            'group_name' => 'Линейные участки',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 3,
            'caption' => 'Сосновка-Платина',
            'group_name' => 'Линейные участки',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 3,
            'caption' => 'Красноленинска-Шаим (0-80км.)',
            'group_name' => 'Линейные участки',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 3,
            'caption' => 'Красноленинска-Шаим (98-125км.)',
            'group_name' => 'Линейные участки',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 3,
            'caption' => 'Красноленинска-Шаим (137-202км.)',
            'group_name' => 'Линейные участки',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 3,
            'caption' => 'Красноленинска-Шаим (211-243км.)',
            'group_name' => 'Линейные участки',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 3,
            'caption' => 'Красноленинска-Шаим (243-345км.)',
            'group_name' => 'Линейные участки',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 3,
            'caption' => 'Шаим 2 - Конда(0-108км.)',
            'group_name' => 'Линейные участки',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 3,
            'caption' => 'Шаим-Тюмень (0-125км.)',
            'group_name' => 'Линейные участки',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 3,
            'caption' => 'Конда-Кума (108-200км.)',
            'group_name' => 'Линейные участки',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 3,
            'caption' => 'Кума-Тюмень (200-266км.)',
            'group_name' => 'Линейные участки',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 3,
            'caption' => 'Кума-Тюмень (266-440км.)',
            'group_name' => 'Линейные участки',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
    }
}
