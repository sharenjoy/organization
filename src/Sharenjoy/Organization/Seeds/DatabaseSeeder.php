<?php namespace Sharenjoy\Organization\Seeds;

use Illuminate\Database\Seeder;
use Eloquent;

class DatabaseSeeder extends Seeder {

    public function run()
    {
        Eloquent::unguard();
        $this->call('Sharenjoy\Organization\Seeds\CompanySeeder');
        
        $this->command->info('All Tables Seeded');
    }

}