<?php

use Faker\Generator;
use JLcourier\Entities\Recojo;

class RecojoTableSeeder extends BaseSeeder
{
    public function getModel()
    {
        return new Recojo();
    }

    public function getDummyData(Generator $faker, array $customValues = array())
    {
        return [
            'punto_recojo' => $faker->name,
            'direccion_recojo' => $faker->address,
			 'responsable_recojo' => $faker->name,
			 'observaciones' => $faker->name,
            'ordenservicio_id' => $this->getRandom('OrdenServicio')->id,
            
        ];
    }

    public function run()
    {
        $this->createMultiple(50);
    }
 
}
