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
            'fecha_inicio' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
			'cliente_id' => $this->getRandom('Cliente')->id,
            'tipo' => $faker->randomElement(['Local', 'Local', 'Nacional']),
            'tiempo' => $faker->randomElement(['24 horas', '48 horas', '2 dias']),
            'nro_orden' => $faker->randomNumber(6),
            'estado' => $faker->randomElement(['En proceso', 'Despachado']),
        ];
    }

    public function run()
    {
        $this->createMultiple(50);
    }

}
