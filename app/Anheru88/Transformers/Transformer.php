<?php

namespace Anheru88\Transformers;


abstract class Transformer {

	
	/**
	 * Tranfrom a collection of items
	 * @param $lessons 
	 * @return array
	 */
	public function transformCollection(array $items)
	{
		return array_map([$this, 'transform'], $items);
	}

	public abstract function transform($item);

}