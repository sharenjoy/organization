<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if ( ! Schema::hasTable('departments') )
        {
            Schema::create('departments', function($table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->index();
                $table->integer('user_id')->default(0);
                $table->string('name', 255);
                $table->string('slug', 255)->unique();
                $table->text('description')->nullable();
                $table->integer('sort')->default(0);
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
		Schema::drop('departments');
	}

}
