<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

    public function run()
    {
        Model::unguard();
        $this->truncateTables(array(
             'users',
             'clientes',
             'servicios', 
             'orden_servicios', 
             'recojos', 
             'entregas', 
             'guia_clientes',
             'item_entregas',
             'guia_transportes',
             'contactos',
             'cotizacions',
             'detalle_cotizacions',
             'adicional_cotizacions',
            
        ));
        $this->call('UserTableSeeder');
        /*
        
        $this->call('ClienteTableSeeder');
        $this->call('ServicioTableSeeder');
        $this->call('OrdenServicioTableSeeder');
        $this->call('RecojoTableSeeder');
        $this->call('EntregaTableSeeder');
        $this->call('GuiaClienteTableSeeder');
        $this->call('ItemEntregaTableSeeder');
        $this->call('GuiaTransporteTableSeeder');
        $this->call('ContactoTableSeeder');
        */
    }

    public function truncateTables(array $tables)
    {
        $this->checkForeignKeys(false);
        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }
        $this->checkForeignKeys(true);
    }

    public function checkForeignKeys($check)
    {
        $check = $check ? '1' : '0';
        DB::statement("SET FOREIGN_KEY_CHECKS = $check;");
    }

}
