<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use MovieApp\Users\Follow;

class FollowsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 100) as $index)
		{
			Follow::create([
        'follower_id' => rand(41,1002),
        'followed_id' => rand(41,1002)
			]);
		}
	}

}