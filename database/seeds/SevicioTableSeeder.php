<?php

use Faker\Generator;
use JLcourier\Entities\Servicio;

class ServicioTableSeeder extends BaseSeeder
{
    public function getModel()
    {
        return new Servicio();
    }

    public function getDummyData(Generator $faker, array $customValues = array())
    {
        return [
            'servicio' => $faker->name,
            'descripcion' => $faker->address,
        ];
    }

    public function run()
    {
        $this->createMultiple(50);
    }

}
