<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuiaClientesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('guia_clientes', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('ordenservicio_id')->unsigned()->index();
            $table->foreign('ordenservicio_id')->references('id')->on('orden_servicios')->onDelete('cascade');
            $table->float('nro_guia');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('guia_clientes');
	}

}
