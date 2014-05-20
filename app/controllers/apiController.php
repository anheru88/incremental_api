<?php


use Illuminate\Http\Response as IlluminateResponse;

class ApiController extends BaseController {

	/**
	 * Status Code - Http status code - default 200
	 * @var integer
	 */
	protected $statusCode = IlluminateResponse::HTTP_OK;

	/**
	 * Get StatusCode
	 * @return integer StatusCode
	 */
	public function getStatusCode()
	{
		return $this->statusCode;
	}


	/**
	 * Set StatusCode
	 * @param integer $statusCode
	 * @return  integer StatusCode
	 */
	public function setStatusCode($statusCode)
	{
		$this->statusCode = $statusCode;

		return $this;
	}

	/**
	 * @param  string $message
	 * @return mixed
	 */
	public function respondNotFound($message = 'Not Found!')
	{
		return $this->setStatusCode(IlluminateResponse::HTTP_NOT_FOUND)->respondWithError($message);
	}

	/**
	 * @param  string $message
	 * @return mixed
	 */
	public function respondInternalError($message = 'Internal Error')
	{
		return $this->setStatusCode(IlluminateResponse::HTTP_INTERNAL_SERVER_ERROR)->respondWithError($message);
	}

	/**
	 * [respond description]
	 * @param  [type] $data
	 * @param  [type] $headers
	 * @return [type]
	 */
	public function respond($data, $headers = [])
	{
		return Response::json($data, $this->getStatusCode(), $headers);
	}

	/**
	 * [respondWithError description]
	 * @param  [type] $message
	 * @return [type]
	 */
	public function respondWithError($message)
	{
		return $this->respond([
			'error' => [
				'message' => $message,
				'status_code' => $this->getStatusCode()
			]
		]);
	}

	/**
	 * [respondCreated description]
	 * @param  [type] $message
	 * @return [type]
	 */
	public function respondCreated($message)
	{
		return $this->setStatusCode(IlluminateResponse::HTTP_CREATED)->respond([
			'message' => $message
		]);
	}
	
	/**
	 * [respondUnprocess description]
	 * @param  [type] $message
	 * @return [type]
	 */
	public function respondUnprocess($message)
	{
		return $this->setStatusCode(IlluminateResponse::HTTP_UNPROCESSABLE_ENTITY)->respond([
			'message' => $message
		]);
	}
}