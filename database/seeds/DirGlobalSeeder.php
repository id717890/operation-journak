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
//        DB::table('dir_global')->delete();

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

        /*******************КП*******************/
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '436 СП / 671 ХК',
            'group_name' => 'Кедровое-Ильичёвка',
            'order' => 1,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);

        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '683 ХК',
            'group_name' => 'Кедровое-Ильичёвка',
            'order' => 2,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);

        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '465 СП / 700 ХК',
            'group_name' => 'Ильичёвка-Катыш',
            'order' => 3,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '467 СП / 702 ХК',
            'group_name' => 'Ильичёвка-Катыш',
            'order' => 4,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '480 СП / 715 ХК',
            'group_name' => 'Ильичёвка-Катыш',
            'order' => 5,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '482 СП / 718 ХК',
            'group_name' => 'Ильичёвка-Катыш',
            'order' => 6,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '497 СП / 732 ХК',
            'group_name' => 'Ильичёвка-Катыш',
            'order' => 7,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);

        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '515 СП / 751 ХК',
            'group_name' => 'Катыш-Конда',
            'order' => 8,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '519 СП / 754 ХК',
            'group_name' => 'Катыш-Конда',
            'order' => 9,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '529 СП / 764 ХК',
            'group_name' => 'Катыш-Конда',
            'order' => 10,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '550 СП / 785 ХК',
            'group_name' => 'Катыш-Конда',
            'order' => 11,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '570 СП / 805 ХК',
            'group_name' => 'Катыш-Конда',
            'order' => 12,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);

        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '590 СП / 825 ХК',
            'group_name' => 'Конда-Ягодное',
            'order' => 13,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '592 СП / 827 ХК',
            'group_name' => 'Конда-Ягодное',
            'order' => 14,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '609 СП / 844 ХК',
            'group_name' => 'Конда-Ягодное',
            'order' => 15,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '629 СП / 858 ХК',
            'group_name' => 'Конда-Ягодное',
            'order' => 16,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '630 СП / 859 ХК',
            'group_name' => 'Конда-Ягодное',
            'order' => 17,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);

        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '656 СП / 890 ХК',
            'group_name' => 'Ягодное-Березовое',
            'order' => 18,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '674 СП / 908 ХК',
            'group_name' => 'Ягодное-Березовое',
            'order' => 19,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '692СП / 926 ХК',
            'group_name' => 'Ягодное-Березовое',
            'order' => 20,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);

        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '729 СП / 963 ХК',
            'group_name' => 'Березовое-Крутое',
            'order' => 21,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '738 СП / 972 ХК',
            'group_name' => 'Березовое-Крутое',
            'order' => 22,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '739 СП / 973 ХК',
            'group_name' => 'Березовое-Крутое',
            'order' => 22,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '750 СП / 985 ХК',
            'group_name' => 'Березовое-Крутое',
            'order' => 23,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '757 СП / 992 ХК',
            'group_name' => 'Березовое-Крутое',
            'order' => 24,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);

        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '773 СП / 1008 ХК',
            'group_name' => 'Крутое-Сосьва',
            'order' => 25,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '782 СП / 1017 ХК',
            'group_name' => 'Крутое-Сосьва',
            'order' => 26,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '797 СП / 1032 ХК',
            'group_name' => 'Крутое-Сосьва',
            'order' => 27,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '808 СП / 1042 ХК',
            'group_name' => 'Крутое-Сосьва',
            'order' => 28,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '825 СП / 1060 ХК',
            'group_name' => 'Крутое-Сосьва',
            'order' => 29,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '836 СП / 1071 ХК',
            'group_name' => 'Крутое-Сосьва',
            'order' => 30,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '837 СП',
            'group_name' => 'Крутое-Сосьва',
            'order' => 31,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);

        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '845 СП / 1080 ХК',
            'group_name' => 'Сосьва-Сосновка',
            'order' => 32,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '847 СП / 1082 ХК',
            'group_name' => 'Сосьва-Сосновка',
            'order' => 33,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '853 СП / 1087 ХК',
            'group_name' => 'Сосьва-Сосновка',
            'order' => 34,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '867 СП / 1101 ХК',
            'group_name' => 'Сосьва-Сосновка',
            'order' => 35,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '878 СП / 1113 ХК',
            'group_name' => 'Сосьва-Сосновка',
            'order' => 36,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '890 СП / 1126 ХК',
            'group_name' => 'Сосьва-Сосновка',
            'order' => 37,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);

        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '911 СП / 1146 ХК',
            'group_name' => 'Сосновка-Платина',
            'order' => 38,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);

        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '912 СП / 1147 ХК',
            'group_name' => 'Сосновка-Платина',
            'order' => 39,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '924 СП / 1159 ХК',
            'group_name' => 'Сосновка-Платина',
            'order' => 40,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '937 СП / 1172 ХК',
            'group_name' => 'Сосновка-Платина',
            'order' => 41,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '950 СП / 1185 ХК',
            'group_name' => 'Сосновка-Платина',
            'order' => 42,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
    }
}
