<?php namespace Sharenjoy\Organization\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesSeeder extends Seeder {

    public function run()
    {
        $types = [
            [
                'name'          => '生洋',
                'slug'          => 'saya',
                'description'   => '',
                'sort'          => '1',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'name'          => '比石硬',
                'slug'          => 'bizin',
                'description'   => '',
                'sort'          => '2',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],

        ];

        DB::table('companies')->insert($types);
        $this->command->info('Settings Table Seeded With An Example Record');

    }

}