<?php

use Faker\Generator;
use JLcourier\Entities\Contacto;

class ContactoTableSeeder extends BaseSeeder
{
    public function getModel()
    {
        return new Contacto();
    }

    public function getDummyData(Generator $faker, array $customValues = array())
    {
        return [
			'cliente_id' => $this->getRandom('Cliente')->id,
            'contacto' => $faker->name,
            'fijo' => $faker->name,
            'celular' => $faker->name,
        ];
    }

    public function run()
    {
        $this->createMultiple(50);
    }

}
