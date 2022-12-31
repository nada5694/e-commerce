<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = \App\models\Product::create([
            'name'             => "Dark Jacket",
            'description'      => 'xxxxxxxxxxxxx',
            'image_name'       => '/assets/website/images/products/jacket-1-min.jpg',
            'price'            => 340,
            'discount'         => 0.10,
            'clothing_type'    => 'casual',
            'product_category' => 'men',
            'is_accessory'     => 'no',
        ]);

        $product = \App\models\Product::create([
            'name'             => "Chino Bottoms",
            'description'      => 'xxxxxxxxxxxxx',
            'image_name'       => '/assets/website/images/products/bottoms-1-min.jpg',
            'price'            => 200,
            'discount'         => 0.12,
            'clothing_type'    => 'casual',
            'product_category' => 'men',
            'is_accessory'     => 'no',
        ]);

        $product = \App\models\Product::create([
            'name'             => "Brown Shoe",
            'description'      => 'xxxxxxxxxxxxx',
            'image_name'       => '/assets/website/images/products/shoe-1-min.jpg',
            'price'            => 350,
            // 'discount'       => 0.12,
            'clothing_type'    => 'casual',
            'product_category' => 'men',
            'is_accessory'     => 'no',
        ]);

        $product = \App\models\Product::create([
            'name'             => "Double Knit Sweater",
            'description'      => 'xxxxxxxxxxxxx',
            'image_name'       => '/assets/website/images/products/sweater-2-min.jpg',
            'price'            => 250,
            // 'discount'       => 0.10,
            'clothing_type'    => 'formal',
            'product_category' => 'men',
            'is_accessory'     => 'no',
        ]);

        $product = \App\models\Product::create([
            'name'             => "The Murray",
            'description'      => 'xxxxxxxxxxxxx',
            'image_name'       => '/assets/website/images/products/watch-1-min.jpg',
            'price'            => 550,
            'discount'         => 0.15,
            // 'clothing_type'    => '2',
            'product_category' => 'men',
            'is_accessory'     => 'yes',
        ]);

        $product = \App\models\Product::create([
            'name'             => "The Modern Sock",
            'description'      => 'xxxxxxxxxxxxx',
            'image_name'       => '/assets/website/images/products/sock-1-min.jpg',
            'price'            => 75,
            // 'discount'       => 0.15,
            'clothing_type'    => 'casual',
            'product_category' => 'men',
            'is_accessory'     => 'no',
        ]);

        $product = \App\models\Product::create([
            'name'             => "Simple Dress",
            'description'      => 'xxxxxxxxxxxxx',
            'image_name'       => '/assets/website/images/products/elia-pellegrini-037X8TwRP4Q-unsplash.jpg',
            'price'            => 750,
            'discount'         => 0.10,
            'clothing_type'    => 'casual',
            'product_category' => 'women',
            'is_accessory'     => 'no',
        ]);

        $product = \App\models\Product::create([
            'name'             => "Treble Neckless",
            'description'      => 'xxxxxxxxxxxxx',
            'image_name'       => '/assets/website/images/products/andres-vera-202NAwjisYA-unsplash.jpg',
            'price'            => 150,
            // 'discount'         => 0.10,
            // 'clothing_type'    => '2',
            'product_category' => 'women',
            'is_accessory'     => 'yes',
        ]);

        $product = \App\models\Product::create([
            'name'             => "Dior Glasses",
            'description'      => 'xxxxxxxxxxxxx',
            'image_name'       => '/assets/website/images/products/laura-chouette-jsvzvpNxZaw-unsplash.jpg',
            'price'            => 340,
            'discount'         => 0.10,
            // 'clothing_type'    => '2',
            'product_category' => 'women',
            'is_accessory'     => 'yes',
        ]);
    }

}
