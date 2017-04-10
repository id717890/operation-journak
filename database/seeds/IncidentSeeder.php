<?php

use Illuminate\Database\Seeder;

class IncidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*Add incidents*/
        DB::table('incidents')->delete();


        for($i=1;$i<=100;$i++)
        {
            DB::table('incidents')->insert([
                'id' => $i,
                'start_date' => date("2017-04-07 18:00:00"),
                'end_date' => date("2017-04-07 19:00:00"),
                'author_id' => 1,
                'who_was_notified' => 'Диспетчер, Оператор',
                'actions' => 'Выезд бригада ТМ',
                'deadline' => date("2017-04-07"),
                'other' => null,
                'issue' => 'Затопление колодца К2',
                'created_at' => DB::raw('CURRENT_TIMESTAMP'),
                'updated_at' => DB::raw('CURRENT_TIMESTAMP')
            ]);

        }

//        DB::table('incidents')->insert([
//            'id' => 2,
//            'start_date' => date("2017-04-06 13:00:00"),
//            'end_date' => date("2017-04-07 05:00:00"),
//            'author_id' => 2,
//            'who_was_notified' => 'Диспетчер, Оператор',
//            'actions' => 'Выезд бригада ТМ',
//            'deadline' => date("2017-04-07"),
//            'other' => 'Выезд бригада ТМ',
//            'issue' => 'Затопление колодца К5',
//            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
//            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
//        ]);
//
//        DB::table('incidents')->insert([
//            'id' => 3,
//            'start_date' => date("2017-04-01 10:00:00"),
//            'end_date' => date("2017-04-01 11:00:00"),
//            'author_id' => 1,
//            'who_was_notified' => 'Диспетчер, Оператор',
//            'actions' => 'Выезд бригада ТМ',
//            'deadline' => null,
//            'other' => 'Выезд бригада ТМ',
//            'issue' => 'Вскрытие колодца К1',
//            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
//            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
//        ]);
//
//        DB::table('incidents')->insert([
//            'id' => 4,
//            'start_date' => date("2017-04-08 11:00:00"),
//            'end_date' => null,
//            'author_id' => 1,
//            'who_was_notified' => 'Диспетчер, Оператор',
//            'actions' => 'Выезд бригада ТМ',
//            'deadline' => null,
//            'other' => null,
//            'issue' => 'Затопление колодца К2',
//            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
//            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
//        ]);
//
//        DB::table('incidents')->insert([
//            'id' => 5,
//            'start_date' => date("2017-04-07 18:00:00"),
//            'end_date' => null,
//            'author_id' => 1,
//            'who_was_notified' => 'Диспетчер, Оператор',
//            'actions' => 'Выезд бригада ТМ',
//            'deadline' => null,
//            'other' => 'Выезд бригада ТМ',
//            'issue' => 'Вскрытие дверей ШТМ',
//            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
//            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
//        ]);
    }
}
