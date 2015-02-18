<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleablesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if ( ! Schema::hasTable('roleables') )
        {
            Schema::create('roleables', function($table)
            {
                $table->engine = 'InnoDB';

                $table->integer('role_id')->index()->unsigned();
                $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');

                $table->string('roleable_id', 36)->index();
                $table->string('roleable_type', 255)->index();
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
		Schema::drop('roleables');
	}

}
