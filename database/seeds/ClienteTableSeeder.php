<?php

use Faker\Generator;
use JLcourier\Entities\Cliente;

class ClienteTableSeeder extends BaseSeeder
{
    public function getModel()
    {
        return new Cliente();
    }

    public function getDummyData(Generator $faker, array $customValues = array())
    {
        return [
            'nombre' => $faker->name,
            'direccion' => $faker->address,
            'ruc' => $faker->randomNumber(8),
			'banco' => $faker->randomElement(['BCP', 'Continental', 'Interbank']),
        ];
    }

    public function run()
    {
        $this->createMultiple(20);
    }

}
