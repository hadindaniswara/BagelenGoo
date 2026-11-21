<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'slug' => 'original',
                'name' => 'Bagelen Original',
                'emoji' => '🥖',
                'tag' => 'Best Seller',
                'description' => 'Rasa klasik gurih manis dengan aroma mentega yang harum.',
                'price' => 15000,
            ],
            [
                'slug' => 'cokelat',
                'name' => 'Bagelen Cokelat',
                'emoji' => '🍫',
                'tag' => 'Favorit',
                'description' => 'Renyah dengan lapisan cokelat yang lumer dan manis.',
                'price' => 17000,
            ],
            [
                'slug' => 'keju',
                'name' => 'Bagelen Keju',
                'emoji' => '🧀',
                'tag' => 'Gurih',
                'description' => 'Gurih asin keju yang pas di setiap gigitan.',
                'price' => 18000,
            ],
            [
                'slug' => 'pandan',
                'name' => 'Bagelen Pandan',
                'emoji' => '🌿',
                'tag' => 'Wangi',
                'description' => 'Aroma pandan yang segar dengan rasa manis lembut.',
                'price' => 16000,
            ],
            [
                'slug' => 'kopi',
                'name' => 'Bagelen Kopi',
                'emoji' => '☕',
                'tag' => 'Bold',
                'description' => 'Perpaduan renyah dan aroma kopi yang khas.',
                'price' => 19000,
            ],
            [
                'slug' => 'bawang',
                'name' => 'Bagelen Bawang',
                'emoji' => '🧄',
                'tag' => 'Savory',
                'description' => 'Gurih bawang putih, cocok jadi teman minum teh.',
                'price' => 15000,
            ],
        ];

        foreach ($products as $product) {
            Product::firstOrCreate(
                ['slug' => $product['slug']],
                $product
            );
        }
    }
}
