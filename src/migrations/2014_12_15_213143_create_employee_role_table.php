<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeRoleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if ( ! Schema::hasTable('employee_role') )
        {
            Schema::create('employee_role', function($table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->index();
                $table->integer('employee_id');
				$table->integer('role_id');
                $table->timestamps();
            });
        }
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('employee_role');
	}

}
