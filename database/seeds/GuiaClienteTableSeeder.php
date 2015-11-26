<?php

use Faker\Generator;
use JLcourier\Entities\GuiaCliente;

class GuiaClienteTableSeeder extends BaseSeeder
{
    public function getModel()
    {
        return new GuiaCliente();
    }

    public function getDummyData(Generator $faker, array $customValues = array())
    {
        return [
            'nro_guia' => $faker->name,
            'ordenservicio_id' => $this->getRandom('OrdenServicio')->id,
        ];
    }

    public function run()
    {
        $this->createMultiple(50);
    }

}
