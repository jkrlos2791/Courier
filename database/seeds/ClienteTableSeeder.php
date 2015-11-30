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
            'ruc' => $faker->name,
			'banco' => $faker->name,
        ];
    }

    public function run()
    {
        $this->createMultiple(20);
    }

}
