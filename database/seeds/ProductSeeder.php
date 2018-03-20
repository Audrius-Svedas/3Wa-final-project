<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      //$faker->name();

      foreach (range(1,40) as $x) {
        $product = new Product;
        $product->manufacturer = $faker->company;
        $product->model = $faker->firstNameMale;
        $product->quantity = $faker->numberBetween($min = 0, $max = 12);
        $product->category = $faker->numberBetween($min = 111, $max = 116);      
        $product->frame_size = $faker->numberBetween($min = 13, $max = 19);
        $product->frame = $faker->randomElement(['alloy', 'carbon']);
        $product->fork = $faker->randomElement(['Radon', 'Cube']);
        $product->gear_shifters = $faker->randomElement(['Shimano', 'SRAM']);
        $product->front_delailleur = $faker->randomElement(['Shimano XT', 'Shimano Deore', 'Shimano Altus']);
        $product->rear_delailleur = $faker->randomElement(['Shimano XT', 'Shimano Deore', 'Shimano Altus']);
        $product->brakes = $faker->randomElement(['Disk type', 'V type',]);
        $product->gears_amount = $faker->numberBetween($min = 18, $max = 29);
        $product->wheel_size = $faker->numberBetween($min = 26, $max = 29);
        $product->weight = $faker->randomFloat($nbMaxDecimals = NULL, $min = 10, $max = 20);
        $product->price = $faker->randomFloat($nbMaxDecimals = NULL, $min = 200, $max = 2500);
        $product->description = $faker->text($maxNbChars = 60);
        $product->imageUrl = $faker->imageUrl($width = 260, $height = 400, 'transport');
        $product->save();
        }
    }
}
