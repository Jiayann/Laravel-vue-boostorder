<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Factory>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @var string
     */
    protected $model = Category:: class;

         /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        $name = $this->faker->jobTitle;

        $nameArr = str_split($name);
        $name = trim($nameArr[0]);

        return [
            'name' => $name,
            //'slug' => Str::slug($name),
        ];
    }
}
