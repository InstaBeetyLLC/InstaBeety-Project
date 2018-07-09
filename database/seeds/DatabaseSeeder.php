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
        $this->call('RegionsTableSeeder');
        $this->call('CitiesTableSeeder');
        $this->call('LocationsTableSeeder');
        $this->call('NationalitiesTableSeeder');
        $this->call('UsersTableSeeder');
        $this->call('RolesTableSeeder');
        $this->call('RoleUserTableSeeder');
    }
}
