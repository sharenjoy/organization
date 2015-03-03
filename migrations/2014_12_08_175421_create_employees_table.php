<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if ( ! Schema::hasTable('employees') )
        {
            Schema::create('employees', function($table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->index();
                $table->integer('user_id')->index()->default(0);
                $table->integer('company_id')->index()->default(0);
                $table->integer('department_id')->index()->default(0);
                $table->string('name', 20);
                $table->string('name_en', 20);
                $table->string('email', 100);
                $table->timestamp('joined_at');
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
		Schema::drop('employees');
	}

}
