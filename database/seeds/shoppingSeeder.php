<?php

use Illuminate\Database\Seeder;

class ShoppingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\Role::class, 1)->create();
    	factory(App\User::class, 1)->create();
        factory(App\Category::class, 1)->create();
    	factory(App\Product::class, 5)->create();
    	factory(App\PaymentGateway::class, 5)->create();
    	factory(App\Transaction::class, 5)->create();
    }
}
