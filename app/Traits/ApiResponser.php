<?php

namespace App\Traits;


trait ApiResponser {

    protected function successResponse($data, $message = null, $code = 200)
	{
		return response()->json([
            'success' => true,
			'status' => 'Success', 
			'message' => $message, 
			'data' => $data
		], $code);
	}

	protected function errorResponse($message = null, $code)
	{
		return response()->json([
            'success' => false,
			'status' => 'Error',
			'message' => $message,
			'data' => null
		], $code);
	}

}