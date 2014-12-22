<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDivisionablesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if ( ! Schema::hasTable('divisionables') )
        {
            Schema::create('divisionables', function($table)
            {
                $table->engine = 'InnoDB';

                $table->integer('division_id')->index();
                // $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');

                $table->string('divisionable_id', 36)->index();
                $table->string('divisionable_type', 255)->index();
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
		Schema::drop('divisionables');
	}

}
