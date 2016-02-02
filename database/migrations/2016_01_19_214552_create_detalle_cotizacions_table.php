<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleCotizacionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('detalle_cotizacions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->integer('cotizacion_id')->unsigned()->index();
            $table->foreign('cotizacion_id')->references('id')->on('cotizacions')->onDelete('cascade');
			$table->string('cantidad');
			$table->float('peso');
			$table->float('largo');
			$table->float('ancho');
			$table->float('alto');
			$table->string('descripcion');
			$table->string('partida');
			$table->string('llegada');
            $table->float('costo_peso');
            $table->float('costo_volumen');
			$table->float('volumen');
			$table->float('monto_total');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('detalle_cotizacions');
	}

}
