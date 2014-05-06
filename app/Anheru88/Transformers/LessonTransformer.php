<?php

namespace Anheru88\Transformers;

class LessonTransformer extends Transformer {

	/**
	 * Description
	 * @param type $lesson 
	 * @return type
	 */
	public function transform($lesson)
	{
		return [
			'title' => $lesson['title'],
			'body' => $lesson['body'],
			'active' => (boolean) $lesson['some_bool']
		];
	}
}