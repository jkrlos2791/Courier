<?php

use Faker\Generator;
use JLcourier\Entities\User;

class UserTableSeeder extends BaseSeeder
{
    public function getModel()
    {
        return new User();
    }

    public function getDummyData(Generator $faker, array $customValues = array())
    {
        return [
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => bcrypt('secret'),
        ];
    }

    public function run()
    {
        $this->createAdmin();
        //$this->createMultiple(50);
    }

    public function createAdmin()
    {
        $this->create([
              'name' => 'Juan Carlos',
              'email' => 'jkrlos2791@gmail.com',
              'password' => bcrypt('admin'),
          ]);
    }
}
