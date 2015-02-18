<?php namespace Sharenjoy\Organization\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder {

    public function run()
    {
        $types = [
            [
                'name'          => '組長',
                'slug'          => 'captain',
                'description'   => '',
                'sort'          => '1',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'name'          => '客服',
                'slug'          => 'customerservice',
                'description'   => '',
                'sort'          => '2',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],

        ];

        DB::table('roles')->insert($types);
        $this->command->info('Settings Table Seeded With An Example Record');

    }

}