<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Cart;
use App\CartDetail;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Yennifer',
            'last_name' => 'Carrasco',
            'email' => 'yennifer@gmail.com',
            'password' => bcrypt(123456),
            ]);
        Cart::create([
            'user_id' => '1',
            'order_date' => '2012-12-12',
            'status' => 'active',
        ]);
        CartDetail::create([
            'cart_id' => '1',
            'product_id' => '1',
            'quantity' => '3',
            'price' => '1000'
        ]);
        CartDetail::create([
            'cart_id' => '1',
            'product_id' => '2',
            'quantity' => '20',
            'price' => '2000'
        ]);
        CartDetail::create([
            'cart_id' => '1',
            'product_id' => '3',
            'quantity' => '8',
            'price' => '25000'
        ]);

    }
}
