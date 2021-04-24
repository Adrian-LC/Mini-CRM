<?php

namespace Database\Factories;

use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class EmpresaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Empresa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        Storage::makeDirectory('public/empresa');
        $dir = storage_path('app/public/empresa');

        return [
            'nombre' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'logotipo' => 'empresa/' . basename($this->faker->image($dir, 400, 400)),
            'sitio_web' => Str::random(10),
        ];
    }
}
