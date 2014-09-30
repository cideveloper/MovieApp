<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
      $genders = ['male', 'female'];
      $genders_key = array_rand($genders);
      $images_catagories = ['abstract', 'animals', 'business', 'cats', 'city', 'food', 'nightlife', 'fashion', 'people', 'nature', 'sports', 'technics', 'transport'];
      $images_catagories_key = array_rand($images_catagories);

			User::create([
        'email' => $faker->email,
        'username' => $faker->userName . rand(1,1000),
        'password' => $faker->password,
        'name' => $faker->name($genders[$genders_key]),
        'gender' => $genders[$genders_key],
        'location' => $faker->country,
        'website' => 'http://www.' . $faker->domainName,
        'bio' => $faker->realText,
        'profile_pic' => $faker->imageUrl(700, 500, $images_catagories[$images_catagories_key]) . rand(1,10),
			]);
		}
	}

}