<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Factory>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @var string
     */
    protected $model = Product:: class;

         /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $productSuffixes = ['Sweater', 'Pants', 'Shirt', 'Glasses', 'Hat', 'Socks'];
        $name = $this -> faker -> company . '' . Arr::random($productSuffixes);
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this -> faker -> realText(100),
            'price' => $this -> faker -> numberBetween(10000, 100000),
            
        ];
    }
}
