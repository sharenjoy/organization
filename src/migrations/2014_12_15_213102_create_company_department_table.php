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

                $table->integer('company_id')->index()->unsigned();
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');

				$table->integer('department_id')->index()->unsigned();
                $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
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
