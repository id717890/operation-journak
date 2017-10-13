<?php

use Illuminate\Database\Seeder;

class DirLkpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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

        /**КШК**/
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '19 КШК',
            'group_name' => 'Красноленинская-Шаим',
            'order' => 43,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '29 КШК',
            'group_name' => 'Красноленинская-Шаим',
            'order' => 44,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '49 КШК',
            'group_name' => 'Красноленинская-Шаим',
            'order' => 45,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '57 КШК',
            'group_name' => 'Красноленинская-Шаим',
            'order' => 46,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '61 КШК',
            'group_name' => 'Красноленинская-Шаим',
            'order' => 47,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '80 КШК',
            'group_name' => 'Красноленинская-Шаим',
            'order' => 48,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '98 КШК',
            'group_name' => 'Красноленинская-Шаим',
            'order' => 49,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '112 КШК',
            'group_name' => 'Красноленинская-Шаим',
            'order' => 50,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '114 КШК',
            'group_name' => 'Красноленинская-Шаим',
            'order' => 51,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '125 КШК',
            'group_name' => 'Красноленинская-Шаим',
            'order' => 52,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '137 КШК',
            'group_name' => 'Красноленинская-Шаим',
            'order' => 53,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '153 КШК',
            'group_name' => 'Красноленинская-Шаим',
            'order' => 54,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '162 КШК',
            'group_name' => 'Красноленинская-Шаим',
            'order' => 55,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '172 КШК',
            'group_name' => 'Красноленинская-Шаим',
            'order' => 56,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '187 КШК',
            'group_name' => 'Красноленинская-Шаим',
            'order' => 57,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '188 КШК',
            'group_name' => 'Красноленинская-Шаим',
            'order' => 58,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '202 КШК',
            'group_name' => 'Красноленинская-Шаим',
            'order' => 59,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '211 КШК',
            'group_name' => 'Красноленинская-Шаим',
            'order' => 60,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '213 КШК',
            'group_name' => 'Красноленинская-Шаим',
            'order' => 61,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '225 КШК',
            'group_name' => 'Красноленинская-Шаим',
            'order' => 62,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '227 КШК',
            'group_name' => 'Красноленинская-Шаим',
            'order' => 63,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '268 КШК',
            'group_name' => 'Красноленинская-Шаим',
            'order' => 64,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '298 КШК',
            'group_name' => 'Красноленинская-Шаим',
            'order' => 65,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '311 КШК',
            'group_name' => 'Красноленинская-Шаим',
            'order' => 66,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '331 КШК',
            'group_name' => 'Красноленинская-Шаим',
            'order' => 67,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '341 КШК',
            'group_name' => 'Красноленинская-Шаим',
            'order' => 68,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);

        /**ШК**/
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '27 ШК',
            'group_name' => 'Шаим-Конда',
            'order' => 69,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '29 ШК',
            'group_name' => 'Шаим-Конда',
            'order' => 70,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '49 ШК',
            'group_name' => 'Шаим-Конда',
            'order' => 71,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '50 ШК',
            'group_name' => 'Шаим-Конда',
            'order' => 72,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '57 ШК',
            'group_name' => 'Шаим-Конда',
            'order' => 73,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '68 ШК',
            'group_name' => 'Шаим-Конда',
            'order' => 74,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '88 ШК',
            'group_name' => 'Шаим-Конда',
            'order' => 75,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '89 ШК',
            'group_name' => 'Шаим-Конда',
            'order' => 76,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);

        /**ШТ (0-108)**/
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '24 ШТ',
            'group_name' => 'Шаим-Тюмень (0-108)',
            'order' => 77,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '25 ШТ',
            'group_name' => 'Шаим-Тюмень (0-108)',
            'order' => 78,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '29 ШТ',
            'group_name' => 'Шаим-Тюмень (0-108)',
            'order' => 79,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '31 ШТ',
            'group_name' => 'Шаим-Тюмень (0-108)',
            'order' => 80,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '58 ШТ',
            'group_name' => 'Шаим-Тюмень (0-108)',
            'order' => 81,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '59 ШТ',
            'group_name' => 'Шаим-Тюмень (0-108)',
            'order' => 82,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '68 ШТ',
            'group_name' => 'Шаим-Тюмень (0-108)',
            'order' => 83,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '125 ШТ',
            'group_name' => 'Шаим-Тюмень (108-200)',
            'order' => 84,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '134 ШТ',
            'group_name' => 'Шаим-Тюмень (108-200)',
            'order' => 85,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '151 ШТ',
            'group_name' => 'Шаим-Тюмень (108-200)',
            'order' => 86,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '164 ШТ',
            'group_name' => 'Шаим-Тюмень (108-200)',
            'order' => 87,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '165 ШТ',
            'group_name' => 'Шаим-Тюмень (108-200)',
            'order' => 88,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '185 ШТ',
            'group_name' => 'Шаим-Тюмень (108-200)',
            'order' => 89,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '195 ШТ',
            'group_name' => 'Шаим-Тюмень (108-200)',
            'order' => 90,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '197 ШТ',
            'group_name' => 'Шаим-Тюмень (108-200)',
            'order' => 91,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '220 ШТ',
            'group_name' => 'Шаим-Тюмень (200-260)',
            'order' => 92,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '231 ШТ',
            'group_name' => 'Шаим-Тюмень (200-260)',
            'order' => 93,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '243 ШТ',
            'group_name' => 'Шаим-Тюмень (200-260)',
            'order' => 94,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '245 ШТ',
            'group_name' => 'Шаим-Тюмень (200-260)',
            'order' => 95,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '252 ШТ',
            'group_name' => 'Шаим-Тюмень (200-260)',
            'order' => 96,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 4,
            'caption' => '260 ШТ',
            'group_name' => 'Шаим-Тюмень (200-260)',
            'order' => 97,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);





    }
}
