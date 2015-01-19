<?php namespace Sharenjoy\Organization\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsSeeder extends Seeder {

    public function run()
    {
        $types = [
            [
                'name'          => '關鍵字行銷規劃部',
                'slug'          => 'ae',
                'description'   => '',
                'sort'          => '1',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'name'          => '關鍵字管理優化部',
                'slug'          => 'am',
                'description'   => '',
                'sort'          => '2',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'name'          => '行銷管理部',
                'slug'          => 'mm',
                'description'   => '',
                'sort'          => '3',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'name'          => '編輯部',
                'slug'          => 'gap',
                'description'   => '',
                'sort'          => '4',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],

        ];

        DB::table('departments')->insert($types);
        $this->command->info('Settings Table Seeded With An Example Record');

    }

}