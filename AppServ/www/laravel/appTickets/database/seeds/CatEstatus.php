<?php

use Illuminate\Database\Seeder;

class CatEstatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cat_estatus')->insert([
            'id' => 1,
            'estatus' => 'cerrado',         
        ]);
        DB::table('cat_estatus')->insert([
            'id' => 2,
            'estatus' => 'probado',         
        ]);
        DB::table('cat_estatus')->insert([
            'id' => 3,
            'estatus' => 'atendiendo',         
        ]);
        DB::table('cat_estatus')->insert([
            'id' => 4,
            'estatus' => 'sin atender',         
        ]);
    }
}
