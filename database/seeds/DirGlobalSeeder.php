<?php

use Illuminate\Database\Seeder;

class DirGlobalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*Add dir global*/
        DB::table('dir_global')->delete();

        DB::table('dir_global')->insert([
            'id' => 16,
            'dir_type_id' => 3,
            'caption' => 'Катыш-Конда',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'id' => 17,
            'dir_type_id' => 3,
            'caption' => 'Конда-Ягодное',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'id' => 18,
            'dir_type_id' => 3,
            'caption' => 'Ягодное-Березовое',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);

        DB::table('dir_global')->insert([
            'id' => 6,
            'dir_type_id' => 2,
            'caption' => 'НПС "Ильичевка"',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'id' => 7,
            'dir_type_id' => 2,
            'caption' => 'НПС "Катыш"',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'id' => 8,
            'dir_type_id' => 2,
            'caption' => 'НПС "Конда-1"',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'id' => 9,
            'dir_type_id' => 2,
            'caption' => 'НПС "Конда-2"',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'id' => 10,
            'dir_type_id' => 2,
            'caption' => 'НПС "Конда-3"',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'id' => 11,
            'dir_type_id' => 2,
            'caption' => 'НПС "Березовое"',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'id' => 12,
            'dir_type_id' => 2,
            'caption' => 'НПС "Крутое"',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'id' => 13,
            'dir_type_id' => 2,
            'caption' => 'НПС "Сосьва-1"',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'id' => 14,
            'dir_type_id' => 2,
            'caption' => 'НПС "Сосьва-2"',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'id' => 15,
            'dir_type_id' => 2,
            'caption' => 'НПС "Сосновка"',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);


        DB::table('dir_global')->insert([
            'id' => 1,
            'dir_type_id' => 1,
            'caption' => 'СГП',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'id' => 2,
            'dir_type_id' => 1,
            'caption' => 'ХК',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'id' => 3,
            'dir_type_id' => 1,
            'caption' => 'КШК',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'id' => 4,
            'dir_type_id' => 1,
            'caption' => 'ШТ',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'id' => 5,
            'dir_type_id' => 1,
            'caption' => 'ШК',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);

    }
}
