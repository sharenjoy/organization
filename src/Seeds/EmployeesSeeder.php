<?php namespace Sharenjoy\Organization\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesSeeder extends Seeder {

    public function run()
    {
        $types = [
            [
                'name'          => '許植勝',
                'company_id'    => '1',
                'department_id' => '3',
                'position_id'   => '1',
                'name_en'       => 'Jason',
                'email'         => 'jason@saya.com.tw',
                'joined_at'     => '2001-10-22',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'name'          => '屠海謙',
                'company_id'    => '1',
                'department_id' => '1',
                'position_id'   => '2',
                'name_en'       => 'Alex',
                'email'         => 'alex@saya.com.tw',
                'joined_at'     => '2010-03-01',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'name'          => '賴文琳',
                'company_id'    => '1',
                'department_id' => '2',
                'position_id'   => '2',
                'name_en'       => 'Lynn',
                'email'         => 'lynn@saya.com.tw',
                'joined_at'     => '2010-07-02',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'name'          => '洪詩婷',
                'company_id'    => '1',
                'department_id' => '2',
                'position_id'   => '4',
                'name_en'       => 'Cecilia',
                'email'         => 'cecilia@saya.com.tw',
                'joined_at'     => '2012-03-01',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'name'          => '張佳雯',
                'company_id'    => '1',
                'department_id' => '2',
                'position_id'   => '0',
                'name_en'       => 'Kitty',
                'email'         => 'kitty@saya.com.tw',
                'joined_at'     => '2013-07-01',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],

        ];

        DB::table('employees')->insert($types);
        $this->command->info('Settings Table Seeded With An Example Record');

    }

}