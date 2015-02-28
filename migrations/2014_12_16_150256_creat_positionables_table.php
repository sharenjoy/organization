<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatPositionablesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if ( ! Schema::hasTable('positionables') )
        {
            Schema::create('positionables', function($table)
            {
                $table->engine = 'InnoDB';

                $table->integer('position_id')->index()->unsigned();
                $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');

                $table->string('positionable_id', 36)->index();
                $table->string('positionable_type', 255)->index();
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
		Schema::drop('positionables');
	}

}
