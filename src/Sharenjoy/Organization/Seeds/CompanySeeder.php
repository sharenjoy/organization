<?php namespace Sharenjoy\Organization\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder {

    public function run()
    {
        $types = [
            [
                'name'          => 'aaa',
                'slug'          => 'bbb',
                'description'   => 'Organization',
                'sort'          => '3',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],

        ];

        DB::table('companies')->insert($types);
        $this->command->info('Settings Table Seeded With An Example Record');

    }

}