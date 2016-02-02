<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdicionalCotizacionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adicional_cotizacions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->integer('cotizacion_id')->unsigned()->index();
            $table->foreign('cotizacion_id')->references('id')->on('cotizacions')->onDelete('cascade');
			$table->string('adicional');
			$table->float('monto');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('adicional_cotizacions');
	}

}
