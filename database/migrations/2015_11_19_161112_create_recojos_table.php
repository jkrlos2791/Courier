<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecojosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('recojos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('ordenservicio_id')->unsigned()->index();
            $table->foreign('ordenservicio_id')->references('id')->on('orden_servicios')->onDelete('cascade');
            $table->string('punto_recojo');
            $table->string('direccion_recojo');
			 $table->string('responsable_recojo');
            $table->string('observaciones');
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
		Schema::drop('recojos');
	}

}
