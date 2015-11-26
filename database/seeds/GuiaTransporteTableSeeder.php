<?php

use Faker\Generator;
use JLcourier\Entities\GuiaTransporte;

class GuiaTransporteTableSeeder extends BaseSeeder
{
    public function getModel()
    {
        return new GuiaTransporte();
    }

    public function getDummyData(Generator $faker, array $customValues = array())
    {
        return [
            'nro_guia' => $faker->name,
            'entrega_id' => $this->getRandom('Entrega')->id,
        ];
    }

    public function run()
    {
        $this->createMultiple(50);
    }

}
