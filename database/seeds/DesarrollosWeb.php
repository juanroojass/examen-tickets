<?php

use Illuminate\Database\Seeder;

class DesarrollosWeb extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cat_desarrollos_web')->insert([
            'id' => 1,
            'desarrollo' => 'appX1',      
        ]);
        DB::table('cat_desarrollos_web')->insert([
            'id' => 2,
            'desarrollo' => 'appX2',      
        ]);
        DB::table('cat_desarrollos_web')->insert([
            'id' => 3,
            'desarrollo' => 'appX3',      
        ]);
    }
}
