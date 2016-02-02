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
            $table->date('fecha_inicio');
            $table->integer('nro_orden');
            $table->enum('tipo', ['Local', 'Nacional']);
            $table->string('tiempo');
            $table->string('direccion_recojo');
            $table->string('punto_recojo');
            $table->enum('estado', ['En proceso', 'Despachado']);
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
