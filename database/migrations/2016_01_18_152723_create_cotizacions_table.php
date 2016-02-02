<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotizacionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cotizacions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->integer('cliente_id')->unsigned()->index();
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->integer('contacto_id')->unsigned()->index();
            $table->foreign('contacto_id')->references('id')->on('contactos')->onDelete('cascade');
			$table->date('fecha_cotizacion');
			$table->integer('nro_cotizacion');
            $table->integer('estado');
            $table->string('servicio');
            $table->float('subtotal1');
            $table->float('subtotal2');
            $table->float('total');
            $table->integer('pago');
            $table->string('moneda');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cotizacions');
	}

}
