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
            'quantity' => '200',
            'value' => '500'
        ]);
        Product::create([
        	'name' => 'Cafe',
        	'description' => 'Café Sanareño',
            'quantity' => '80',
            'value' => '550'
        ]);
        Product::create([
        	'name' => 'Queso',
        	'description' => 'Queso por kilo',
            'quantity' => '30',
            'value' => '5770'
        ]);
        factory(Product::class)->times(17)->create();
    }
}
