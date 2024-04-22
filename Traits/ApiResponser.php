<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponser

{
    /**
    * Build success response
    * @param string|array $data
    * @param int $code
    * @return Illuminate\Http\JsonResponse
    */
    public function successResponse($data, $code = Response::HTTP_OK){
        // This code is changed since the message return in already formatted by API responser of each site
        return response($data, $code)->header('Content-Type', 'application/json');
    }

   
    public function validResponse($data, $code = Response::HTTP_OK)
    {
        return response()->json(['data'], $code);
    }

    /**
    * Build error responses
    * @param string|array $message
    * @param int $code
    * @return Illuminate\Http\JsonResponse
    */
    // Error response formatted by api gateway itself
    public function errorResponse($message, $code)
    {
        return response()->json(['error' => $message,'code'=> $code], $code);
    }

    // Error message generated by the API site
    public function errorMessage($message, $code)
    {
        return response($message, $code)->header('Content-Type', 'application/json');
    }
}