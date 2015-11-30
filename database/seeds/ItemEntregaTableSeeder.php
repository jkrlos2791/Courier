<?php

use Faker\Generator;
use JLcourier\Entities\ItemEntrega;

class ItemEntregaTableSeeder extends BaseSeeder
{
    public function getModel()
    {
        return new ItemEntrega();
    }

    public function getDummyData(Generator $faker, array $customValues = array())
    {
        return [
            'cantidad' => $faker->randomNumber($nbDigits = 1),
            'peso' => $faker->randomNumber($nbDigits = 2),
			'envio' => $faker->word,
            'descripcion' => $faker->sentence($nbWords = 6),
            'entrega_id' => $this->getRandom('Entrega')->id,
            
        ];
    }

    public function run()
    {
        $this->createMultiple(600);
    }

}
