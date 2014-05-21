<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class LessonTagTableSeeder extends Seeder {

	public function run()
	{
		$faker    = Faker::create();
		$lessonId = Lesson::lists('id');
		$tagsId   = Tag::lists('id');

		foreach(range(1, 10) as $index)
		{
			DB::table('lesson_tag')->insert([
				'lesson_id' => $faker->randomElement($lessonId),
				'tag_id'    => $faker->randomElement($tagsId)
			]);
		}
	}

}