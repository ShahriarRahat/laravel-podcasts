<?php

namespace App\Traits;

trait RespondsWithHttpStatus
{
    /**
     * @param $message
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondWithSuccess($message, $data=[], $code = 200)
    {
        if($data){
            return response()->json([
                'status' => 'success',
                'message' => $message,
                'data' => $data
            ], $code);
        }else{
            return response()->json([
                'status' => 'success',
                'message' => $message
            ], $code);
        }

    }

    /**
     * @param $message
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondWithError($message, $code = 400)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message
        ], $code);
    }
}
