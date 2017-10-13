<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*Add roles*/
        DB::table('roles')->delete();
        DB::table('roles')->insert([
            'id' => 1,
            'name' => 'admin',
            'display_name' => 'User Administrator',
            'description' => 'User is allowed to manage and edit other users'
        ]);

        DB::table('roles')->insert([
            'id' => 2,
            'name' => 'engineer',
            'display_name' => 'Инженер',
            'description' => 'Инженер-электроник'
        ]);

        DB::table('users')->delete();
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Юсупов З.А.',
            'email' => 'YusupovZA',
            'email_confirmed' => true,
            'password' => Hash::make('Cegthg@hjkm04'),
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Сербин Ю.В.',
            'email' => 'SerbinYV',
            'password' => Hash::make('22'),
            'email_confirmed' => true,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('users')->insert([
            'id' => 3,
            'name' => 'Шакирова Е.Ю.',
            'email' => 'ShakirovaEY',
            'email_confirmed' => true,
            'password' => Hash::make('33'),
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('users')->insert([
            'id' => 4,
            'name' => 'Шкилёва Н.А.',
            'email' => 'ShkilevaNA',
            'email_confirmed' => true,
            'password' => Hash::make('44'),
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('users')->insert([
            'id' => 5,
            'name' => 'Туганова И.В.',
            'email' => 'TuganovaIV',
            'email_confirmed' => true,
            'password' => Hash::make('55'),
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('users')->insert([
            'id' => 6,
            'name' => 'Евтушенко Н.М.',
            'email' => 'EvtushenkoNM',
            'email_confirmed' => true,
            'password' => Hash::make('66'),
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);


        DB::table('role_user')->delete();
        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_id' => 1
        ]);
        DB::table('role_user')->insert([
            'user_id' => 2,
            'role_id' => 2
        ]);
        DB::table('role_user')->insert([
            'user_id' => 3,
            'role_id' => 2
        ]);
        DB::table('role_user')->insert([
            'user_id' => 4,
            'role_id' => 2
        ]);
        DB::table('role_user')->insert([
            'user_id' => 5,
            'role_id' => 2
        ]);
        DB::table('role_user')->insert([
            'user_id' => 6,
            'role_id' => 2
        ]);
    }
}
