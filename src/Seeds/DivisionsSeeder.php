<?php namespace Sharenjoy\Organization\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionsSeeder extends Seeder {

    public function run()
    {
        $types = [
            [
                'name'          => '文琳組',
                'slug'          => 'amone',
                'description'   => '',
                'sort'          => '1',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'name'          => '海謙組',
                'slug'          => 'aeone',
                'description'   => '',
                'sort'          => '2',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],

        ];

        DB::table('divisions')->insert($types);
        $this->command->info('Settings Table Seeded With An Example Record');

    }

}