<?php

use Illuminate\Database\Seeder;

class TipoUsuario extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_usuario')->insert([
            'id' => 1,
            'usuario' => 'dev',         
        ]);
        DB::table('tipo_usuario')->insert([
            'id' => 2,
            'usuario' => 'tester',         
        ]);
    }
}
