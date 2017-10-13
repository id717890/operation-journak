<?php

use Illuminate\Database\Seeder;

class DirMnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*МН*/
        DB::table('dir_global')->insert([
            'dir_type_id' => 1,
            'caption' => 'Сургут - Полоцк',
            'group_name' => 'Магистральные нефтепроводы',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 1,
            'caption' => 'Холмогоры - Клин',
            'group_name' => 'Магистральные нефтепроводы',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 1,
            'caption' => 'Красноленинская - Шаим - Конда',
            'group_name' => 'Магистральные нефтепроводы',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 1,
            'caption' => 'Шаим - Тюмень',
            'group_name' => 'Магистральные нефтепроводы',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_global')->insert([
            'dir_type_id' => 1,
            'caption' => 'Шаим - Конда',
            'group_name' => 'Магистральные нефтепроводы',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
    }
}
