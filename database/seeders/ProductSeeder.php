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
            ],
            [
                'slug' => 'cokelat',
                'name' => 'Bagelen Cokelat',
                'emoji' => '🍫',
                'tag' => 'Favorit',
                'description' => 'Renyah dengan lapisan cokelat yang lumer dan manis.',
            ],
            [
                'slug' => 'keju',
                'name' => 'Bagelen Keju',
                'emoji' => '🧀',
                'tag' => 'Gurih',
                'description' => 'Gurih asin keju yang pas di setiap gigitan.',
            ],
            [
                'slug' => 'pandan',
                'name' => 'Bagelen Pandan',
                'emoji' => '🌿',
                'tag' => 'Wangi',
                'description' => 'Aroma pandan yang segar dengan rasa manis lembut.',
            ],
            [
                'slug' => 'kopi',
                'name' => 'Bagelen Kopi',
                'emoji' => '☕',
                'tag' => 'Bold',
                'description' => 'Perpaduan renyah dan aroma kopi yang khas.',
            ],
            [
                'slug' => 'bawang',
                'name' => 'Bagelen Bawang',
                'emoji' => '🧄',
                'tag' => 'Savory',
                'description' => 'Gurih bawang putih, cocok jadi teman minum teh.',
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
