<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuiaTransportesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('guia_transportes', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('entrega_id')->unsigned()->index();
            $table->foreign('entrega_id')->references('id')->on('entregas')->onDelete('cascade');
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
		Schema::drop('guia_transportes');
	}

}
