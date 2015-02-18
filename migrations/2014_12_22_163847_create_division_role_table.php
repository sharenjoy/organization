<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDivisionRoleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if ( ! Schema::hasTable('division_role') )
        {
            Schema::create('division_role', function($table)
            {
                $table->engine = 'InnoDB';

                $table->integer('division_id')->index()->unsigned();
                $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');

				$table->integer('role_id')->index()->unsigned();
                $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
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
		Schema::drop('division_role');
	}

}
