<?php

class LessonsTest extends ApiTester {

	/** @test */
	public function it_fetches_lessons()
	{
		$this->makeLesson();

		$this->getJson('api/v1/lessons');

		$this->assertResponseOk();

	}

	/** @test */
	public function ir_fetches_a_single_lesson()
	{
		$this->makeLesson();

		$lesson = $this->getJson('api/v1/lessons/1')->data;

		$this->assertResponseOk();

		$this->assertObjectHasAttributes($lesson, 'body', 'active');
	}

	/** @test */
	public function it_404_if_a_lesson_is_not_found()
	{
		$this->getJson('api/v1/lessons/x');

		$this->assertResponseStatus(404);
	}

	private function makeLesson($lessonFields = [])
	{
		$lesson = array_merge([
			'title' 	=> $this->fake->sentence,
			'body'  	=> $this->fake->paragraph,
			'some_bool' => $this->fake->boolean
		], $lessonFields);

		while($this->times--) Lesson::create($lesson);
	}


}