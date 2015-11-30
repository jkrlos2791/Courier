<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemEntregasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('item_entregas', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('entrega_id')->unsigned()->index();
            $table->foreign('entrega_id')->references('id')->on('entregas')->onDelete('cascade');
            $table->integer('cantidad');
			$table->decimal('peso', 5, 2);
            $table->string('medidas');
            $table->string('volumen');
			$table->string('envio');
			$table->string('descripcion');
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
		Schema::drop('item_entregas');
	}

}
