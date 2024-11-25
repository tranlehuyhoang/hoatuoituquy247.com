<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductVariantSeeder extends Seeder
{
    public function run()
    {
        // Loop through product IDs from 411 to 573
        for ($productId = 415; $productId <= 570; $productId++) {
            for ($variantNumber = 1; $variantNumber <= 5; $variantNumber++) {
                DB::table('product_variants')->insert([
                    'name' => 'Variant ' . $variantNumber, // Example name for the variant
                    'sku' =>'PVN' . $variantNumber .  $productId  , // Random SKU of 20 characters
                    'price' => rand(1000000, 10000000),
                    'discount_price' =>  rand(1000000, 10000000),
                    'image' => 'product_variants/' . $variantNumber . '.png', // Example image path
                    'product_id' => $productId, // Set the product ID
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}