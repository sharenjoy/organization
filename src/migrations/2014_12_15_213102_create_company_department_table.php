<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyDepartmentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if ( ! Schema::hasTable('company_department') )
        {
            Schema::create('company_department', function($table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->index();
                $table->integer('company_id');
				$table->integer('department_id');
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
		Schema::drop('company_department');
	}

}
