<?php

namespace Anheru88\Transformers;

class TagTransformer extends Transformer {

	/**
	 * Description
	 * @param type $lesson 
	 * @return type
	 */
	public function transform($tag)
	{
		return [
			'name' => $tag['name'],
		];
	}
}