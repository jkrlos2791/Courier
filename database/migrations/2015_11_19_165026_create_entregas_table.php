<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntregasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('entregas', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('orden_servicio_id')->unsigned()->index();
            $table->foreign('orden_servicio_id')->references('id')->on('orden_servicios')->onDelete('cascade');
            $table->string('cliente_final');
            $table->string('tipo_servicio');
            $table->string('destino');
            $table->string('direccion_destino');
            $table->date('fecha_entrega');
            $table->time('hora');
			$table->string('recepcionado_por');
            $table->string('dni');
			$table->string('cargo');
            $table->string('sello_firma');
			$table->string('responsable_entrega');
			$table->string('observaciones');
			$table->enum('estado',['En almacen','En ruta', 'Entregado']);
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
		Schema::drop('entregas');
	}

}
