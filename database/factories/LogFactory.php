<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //'nome','site','uf','email'
        return [
            'ip'      => $this->faker->name,
            'rota'    => $this->faker->name,
        ];
    }
}
