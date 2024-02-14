<?php

namespace Database\Factories;

use App\Models\Inmueble;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class InmuebleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Inmueble::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->company,
            'direccion' => $this->faker->address,
            'imagen' => 'https://img.freepik.com/vector-gratis/hermosa-casa_24877-50819.jpg',
            'descripcion' => $this->faker->text(100),
            'movimiento' => $this->faker->randomElement(['1', '2']),
            'user_id' => User::all()->random()->id,
        ];
    }
}
