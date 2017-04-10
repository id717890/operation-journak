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
            'email' => 'jusupovz@gmail.com',
            'email_confirmed' => true,
            'password' => Hash::make('1'),
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Менеджер',
            'email' => 'manager@gmail.com',
            'password' => Hash::make('2'),
            'email_confirmed' => true,
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
    }
}
