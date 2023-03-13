<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Setting;

class SettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Setting::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'group_name' => 'essa_group',
            'name' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'key' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'type' => $this->faker->randomElement(['bool', 'string', 'text']),
            'value' => $this->faker->text,
        ];
    }
}
