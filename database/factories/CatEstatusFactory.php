<?php

namespace Database\Factories;

use App\Models\CatEstatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CatEstatusFactory extends Factory
{
    protected $model = CatEstatus::class;

    public function definition()
    {
        return [
			'estatus' => $this->faker->name,
        ];
    }
}
