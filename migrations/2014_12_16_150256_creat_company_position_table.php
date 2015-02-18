<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatCompanyPositionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if ( ! Schema::hasTable('company_position') )
        {
            Schema::create('company_position', function($table)
            {
                $table->engine = 'InnoDB';

                $table->integer('company_id')->index()->unsigned();
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
                
				$table->integer('position_id')->index()->unsigned();
                $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
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
		Schema::drop('company_position');
	}

}
