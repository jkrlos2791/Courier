<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenServiciosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orden_servicios', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('cliente_id')->unsigned()->index();
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->timestamp('fecha_inicio');
            $table->integer('nro_orden');
            $table->enum('tipo', ['local', 'nacional']);
            $table->enum('tiempo', ['24 horas', '48 horas', '2 dias']);
            $table->enum('estado', ['en almacen', 'en ruta', 'finalizado']);
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
		Schema::drop('orden_servicios');
	}

}
