<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Role::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'gender' => $faker->titleMale,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'role_id' => 1,
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'description' => $faker->text,
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'price' => 200,
        'description' => $faker->text,
        'discount' => 2,
        'tax' => 5,
        'category_id' => 1,
    ];
});

$factory->define(App\PaymentGateway::class, function (Faker\Generator $faker) {

    return [
        'name' => 'paypal',
        'logo' => $faker->imageUrl($width = 640, $height = 480),
        'client_id' => 'sk_aaa8425d3e852ea99c34f98cf3bba',
        'client_secret' => 'da39a3ee5e6b4b0d3255bfef95601890afd80709',
        'callback_url' => $faker->url,
    ];
});

$factory->define(App\Transaction::class, function (Faker\Generator $faker) {

    return [
        'currency' => 'KWR',
        'item_name' => $faker->name,
        'item_quantity' => 2,
        'item_price' => 250,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'status' => 0,
        'product_id' => 1,
        'payment_gateway_id' => 1,
        'user_id' => 1,
    ];
});
