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
            'cantidad' => $faker->creditCardNumber,
            'peso' => $faker->creditCardNumber,
			'envio' => $faker->name,
            'descripcion' => $faker->address,
            'entrega_id' => $this->getRandom('Entrega')->id,
            
        ];
    }

    public function run()
    {
        $this->createMultiple(50);
    }

}
