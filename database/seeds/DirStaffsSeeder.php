<?php

use Illuminate\Database\Seeder;

class DirStaffsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dir_staffs')->delete();
        DB::table('dir_staffs')->insert([
            'fio' => 'Шакиров А.Р.',
            'phone' => '0001',
            'post' => 'Зам. гл. инженера по АСУ',
            'department' => 'АСУ',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_staffs')->insert([
            'fio' => 'Колесов И.В.',
            'phone' => '0002',
            'post' => 'Начальник сектора СДКУ',
            'department' => 'АСУ',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_staffs')->insert([
            'fio' => 'Ходюш Н.А.',
            'phone' => '2113',
            'post' => 'Оператор',
            'department' => 'НПС Красноленинская',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('dir_staffs')->insert([
            'id'=>10000,
            'fio' => 'Диспетчер РДП, опертор НПС',
            'phone' => '',
            'post' => '',
            'department' => '',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);


    }
}
