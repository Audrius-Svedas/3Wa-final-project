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
        $product->manufacturer = $faker->randomElement(['Giant', 'Cube', 'Merida', 'Felt', 'Fuji']);
        $product->model = $faker->randomElement(['Stereo 140', 'Reaction 500', 'Action 2400', 'FR 30', 'B14', 'Dispatch 7', 'Absplute 2.1', 'Jari 2.5']);;
        $product->quantity = $faker->numberBetween($min = 0, $max = 12);
        $product->category = $faker->randomElement(['Mountain', 'Road', 'City', 'Fat', 'E-Bike']);
        $product->frame_size = $faker->randomElement(['16', '18', '20', '22']);
        $product->frame = $faker->randomElement(['alloy', 'carbon']);
        $product->fork = $faker->randomElement(['Radon 100', 'Fox 32', 'Suntour XCM', 'RockShox XC30', 'Suntour XCT']);
        $product->gear_shifters = $faker->randomElement(['Shimano XR120', 'SRAM 8090']);
        $product->front_delailleur = $faker->randomElement(['Shimano XT', 'Shimano Deore', 'Shimano Altus']);
        $product->rear_delailleur = $faker->randomElement(['Shimano XT', 'Shimano Deore', 'Shimano Altus']);
        $product->brakes = $faker->randomElement(['Disk type', 'V type',]);
        $product->gears_amount = $faker->randomElement(['18', '21', '24', '27']);
        $product->wheel_size = $faker->numberBetween($min = 26, $max = 29);
        $product->weight = $faker->randomFloat($nbMaxDecimals = NULL, $min = 10, $max = 20);
        $product->price = $faker->randomFloat($nbMaxDecimals = NULL, $min = 200, $max = 2500);
        $product->description = $faker->text($maxNbChars = 150);
        $product->save();
        }
    }
}
