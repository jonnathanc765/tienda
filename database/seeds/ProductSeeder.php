<?php

use Illuminate\Database\Seeder;
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
        Product::create([
        	'name' => 'Mayonesa',
            'description' => 'Mayonesa marca mavesa',
            'price' => '6000',
        	'quantity' => '200',
        ]);
        Product::create([
        	'name' => 'Cafe',
            'description' => 'Café Sanareño',
            'price' => '15000',
        	'quantity' => '80',
        ]);
        Product::create([
        	'name' => 'Queso',
            'description' => 'Queso por kilo',
            'price' => '12000',
        	'quantity' => '30',
        ]);
        factory(Product::class)->times(17)->create();
    }
}
