<?php namespace Sharenjoy\Organization\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionsSeeder extends Seeder {

    public function run()
    {
        $types = [
            [
                'name'          => '總經理',
                'slug'          => 'boss',
                'description'   => '',
                'sort'          => '1',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'name'          => '經理',
                'slug'          => 'manager',
                'description'   => '',
                'sort'          => '2',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'name'          => '副理',
                'slug'          => 'submanager',
                'description'   => '',
                'sort'          => '3',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'name'          => '主任',
                'slug'          => 'director',
                'description'   => '',
                'sort'          => '4',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],

        ];

        DB::table('positions')->insert($types);
        $this->command->info('Settings Table Seeded With An Example Record');

    }

}