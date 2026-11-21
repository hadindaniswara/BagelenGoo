<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $customers = [
            ['name' => 'Budi Santoso', 'phone' => '081234567890', 'email' => 'budi@example.com', 'address' => 'Jl. Merdeka No. 10, Bekasi'],
            ['name' => 'Siti Aminah',  'phone' => '081298765432', 'email' => 'siti@example.com', 'address' => 'Jl. Melati No. 5, Bekasi'],
            ['name' => 'Andi Wijaya',  'phone' => '085612345678', 'email' => null,               'address' => null],
        ];

        foreach ($customers as $customer) {
            Customer::create($customer);
        }
    }
}