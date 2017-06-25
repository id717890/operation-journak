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

        /*НПС*/
        DB::table('dir_global')->insert([
            'dir_type_id' => 2,
            'caption' => 'НПС "Ильичевка"',
            'group_name' => 'Нефтеперкачивающие станции',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 2,
            'caption' => 'НПС "Катыш"',
            'group_name' => 'Нефтеперкачивающие станции',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 2,
            'caption' => 'НПС "Конда-1"',
            'group_name' => 'Нефтеперкачивающие станции',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 2,
            'caption' => 'НПС "Конда-2"',
            'group_name' => 'Нефтеперкачивающие станции',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 2,
            'caption' => 'НПС "Конда-3"',
            'group_name' => 'Нефтеперкачивающие станции',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 2,
            'caption' => 'НПС "Березовое-1"',
            'group_name' => 'Нефтеперкачивающие станции',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 2,
            'caption' => 'НПС "Березовое-2"',
            'group_name' => 'Нефтеперкачивающие станции',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 2,
            'caption' => 'НПС "Крутое"',
            'group_name' => 'Нефтеперкачивающие станции',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 2,
            'caption' => 'НПС "Сосьва-1"',
            'group_name' => 'Нефтеперкачивающие станции',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 2,
            'caption' => 'НПС "Сосьва-2"',
            'group_name' => 'Нефтеперкачивающие станции',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 2,
            'caption' => 'НПС "Сосновка"',
            'group_name' => 'Нефтеперкачивающие станции',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);

        /*МН*/
        DB::table('dir_global')->insert([
            'dir_type_id' => 1,
            'caption' => 'СГП',
            'group_name' => 'Магистральные нефтепроводы',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 1,
            'caption' => 'ХК',
            'group_name' => 'Магистральные нефтепроводы',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 1,
            'caption' => 'КШК',
            'group_name' => 'Магистральные нефтепроводы',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 1,
            'caption' => 'ШТ',
            'group_name' => 'Магистральные нефтепроводы',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 1,
            'caption' => 'ШК',
            'group_name' => 'Магистральные нефтепроводы',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);

        /*КП*/
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '590 СП / 825 ХК',
            'group_name' => 'Конда-Ягодное',
            'order' => 1,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '592 СП / 827 ХК',
            'group_name' => 'Конда-Ягодное',
            'order' => 2,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '609 СП / 844 ХК',
            'group_name' => 'Конда-Ягодное',
            'order' => 3,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);

        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '570 СП / 806 ХК',
            'group_name' => 'Катыш-Конда',
            'order' => 4,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '656 СП / 890 ХК',
            'group_name' => 'Ягодное-Березовое',
            'order' => 5,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '729 СП / 963 ХК',
            'group_name' => 'Березовое-Крутое',
            'order' => 6,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '773 СП / 1008 ХК',
            'group_name' => 'Крутое-Сосьва',
            'order' => 7,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
    }
}
