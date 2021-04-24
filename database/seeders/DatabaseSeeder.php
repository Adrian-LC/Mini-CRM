<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables([
            'users',
            'empresas',
            'empleados'
        ]);

        $this->call(UsersTableSeeder::class);
        $this->call(EmpresasTableSeeder::class);
        $this->call(EmpleadosTableSeeder::class);
    }

    protected function truncateTables($tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); //desactivar el fk

        foreach ($tables as $table) {
          DB::table($table)->truncate(); //eliminar registros de la tabla, para luego generarlos de nuevo
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); //activar el fk
    }
}
