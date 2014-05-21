<?php

class Lesson extends \Eloquent {
	protected $fillable = ['title', 'body'];

	/**
	 * Regresa los tags asociados con la lección.
	 * @return Array de Tags
	 */
	public function tags()
	{
		return $this->belongsToMany('Tag');
	}
}	