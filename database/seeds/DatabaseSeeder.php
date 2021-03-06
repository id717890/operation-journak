<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call('UserSeeder');
        $this->call('SettingsSeeder');
        $this->call('DirTypeSeeder');
        $this->call('IncidentSeeder');
        $this->call('DirGlobalSeeder');
        $this->call('DirNpsSeeder');
        $this->call('DirLuSeeder');
        $this->call('DirLkpSeeder');
        $this->call('DirMnSeeder');
        $this->call('DirIssuesSeeder');
        $this->call('DirStaffsSeeder');
    }
}
