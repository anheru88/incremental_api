<?php

use Anheru88\Transformers\TagTransformer;

class TagsController extends ApiController {

	protected $tagTransformer;

	function __construct(TagTransformer $tagTransformer)
	{
		$this->tagTransformer = $tagTransformer;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($lessonId = null)
	{
		$tags = $this->getTags($lessonId);

		return $this->respond([
			'data' => $this->tagTransformer->transformCollection($tags->all())
		]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * [getTags description]
	 * @param  [type] $lessonId
	 * @return [type]
	 */
	private function getTags($lessonId)
	{
		return $lessonId ? Lesson::findOrFail($lessonId)->tags : Tag::all();
	}

}