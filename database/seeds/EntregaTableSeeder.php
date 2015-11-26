<?php

use Faker\Generator;
use JLcourier\Entities\Entrega;

class EntregaTableSeeder extends BaseSeeder
{
    public function getModel()
    {
        return new Entrega();
    }

    public function getDummyData(Generator $faker, array $customValues = array())
    {
        return [
            'cliente_final' => $faker->name,
            'tipo_servicio' => $faker->address,
			'destino' => $faker->name,
            'direccion_destino' => $faker->address,
			'fecha_entrega' => $faker->date($format = 'd-m-Y', $max = 'now'),
            'hora' => $faker->time($format = 'H:i:s', $max = 'now'),
			'recepcionado_por' => $faker->name,
            'dni' => $faker->address,
			'cargo' => $faker->name,
            'sello_firma' => $faker->address,
			'responsable_entrega' => $faker->name,
			'observaciones' => $faker->name,
            'estado' => $faker->address,
            'orden_servicio_id' => $this->getRandom('OrdenServicio')->id,
            
        ];
    }

    public function run()
    {
        $this->createMultiple(50);
    }

}
