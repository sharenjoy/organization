<?php namespace Sharenjoy\Organization\Seeds;

use Illuminate\Database\Seeder;
use Eloquent;

class DatabaseSeeder extends Seeder {

    public function run()
    {
        Eloquent::unguard();
        $this->call('Sharenjoy\Organization\Seeds\CompaniesSeeder');
        $this->call('Sharenjoy\Organization\Seeds\DepartmentsSeeder');
        $this->call('Sharenjoy\Organization\Seeds\PositionsSeeder');
        $this->call('Sharenjoy\Organization\Seeds\DivisionsSeeder');
        $this->call('Sharenjoy\Organization\Seeds\RolesSeeder');
        $this->call('Sharenjoy\Organization\Seeds\EmployeesSeeder');
        
        $this->command->info('All Tables Seeded');
    }

}