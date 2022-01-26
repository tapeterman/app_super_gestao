<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\pt_BR\Address;
use App\Models\Fornecedor;

class FornecedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Fornecedor::class;


    public function definition()
    {
        //'nome','site','uf','email'
        return [
            'nome'      => $this->faker->name,
            'site'      => $this->faker->domainName,
            'uf'        => $this->faker->regionAbbr,
            'email'     => $this->faker->unique()->companyEmail,

        ];
    }
}
