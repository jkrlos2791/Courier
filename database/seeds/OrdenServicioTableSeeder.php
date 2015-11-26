<?php

use Faker\Generator;
use JLcourier\Entities\OrdenServicio;

class OrdenServicioTableSeeder extends BaseSeeder
{
    public function getModel()
    {
        return new OrdenServicio();
    }

    public function getDummyData(Generator $faker, array $customValues = array())
    {
        return [
            'fecha_inicio' => $faker->dateTime($max = 'now'),
			'cliente_id' => $this->getRandom('Cliente')->id,
            'tipo' => $faker->randomElement(['local', 'local', 'nacional']),
            'tiempo' => $faker->randomElement(['24 horas', '48 horas', '2 dias']),
            'nro_orden' => $faker->randomNumber(6),
            'estado' => $faker->randomElement(['en almacen', 'en ruta', 'finalizado']),
        ];
    }

    public function run()
    {
        $this->createMultiple(50);
    }

}
