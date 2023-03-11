<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        Customer::create([
            'name' => 'Diego',
            'email' => 'erdiegoant@gmail.com',
            'phone' => '12341234',
            'document' => '12341234',
        ]);
    }
}
