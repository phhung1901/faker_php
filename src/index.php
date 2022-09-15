<?php
require_once 'vendor/autoload.php';

// demo fake data and formatters
function fake_data(){
    $faker = Faker\Factory::create();

    echo $faker->name."\n";
    echo $faker->email."\n";
    echo $faker->phoneNumber()."\n";
    echo $faker->randomDigit()."\n";
    echo $faker->country()." ".$faker->address()."\n";
    print_r($faker->dateTime($max = 'now', $timezone = null));
}
//fake_data();

// demo modifiers
function modifiers(){
    $faker = Faker\Factory::create();

    // unique
    try {
        for ($i = 0; $i < 10; $i++){
            $values [$i] = $faker->unique()->randomDigitNotNull();
//            $values [$i] = $faker->unique($reset = true)->randomDigitNotNull();
        }
        print_r($values);
    }catch (Exception $exception){
        echo "Erorrrrrr\n";
    }

    //optional
    for ($i = 0; $i < 10; $i++){
        $values[$i] = $faker->optional($weight = 0.4, $defaul = "Hung")->randomDigit();
    }
    print_r($values);

    //valid
    $check = function ($number){
        return $number % 2 === 0;
    };
    try {
        for ($i = 0; $i < 10; $i++){
            $values[$i] = $faker->valid($check)->randomDigitNotNull();
        }
        print_r($values);
    }catch (Exception $exception){
        echo "Erorrrrrr";
    }

}
//modifiers();

// demo localization
function localization(){
    $faker = Faker\Factory::create('vi_VN');
    for ($i = 0; $i < 10; $i++) {
        echo $faker->name, "\n";
        echo $faker->address, "\n";
    }
}
//localization();


//