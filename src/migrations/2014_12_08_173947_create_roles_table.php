<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if ( ! Schema::hasTable('roles') )
        {
            Schema::create('roles', function($table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->index();
                $table->integer('user_id')->unsigned()->nullable()->default(0);
                $table->string('name', 255);
                $table->string('slug', 255)->unique();
                $table->text('description')->nullable();
                $table->integer('sort')->unsigned()->nullable()->default(0);
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
		Schema::drop('roles');
	}

}
