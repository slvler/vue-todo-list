<?php

namespace App\Http\Utils;

use Illuminate\Http\Response;

trait Message
{
    public function __construct()
    {}
    /**
     * success response method.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendResponse($data, $message = null, $code = Response::HTTP_OK)
    {
        $response = [
            'success' => true,
            'data' => $data,
        ];

        if (! empty($message)) {
            $response['message'] = $message;
        }

        return response()->json($response, $code);
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendError($message, $error = [], $data = [], $code = Response::HTTP_NOT_FOUND)
    {
        $response = [
            'success' => false,
            'message' => $message,
        ];

        if (! empty($error)) {
            $response['errors'] = $error;
        }

        if (! empty($data)) {
            $response['data'] = $data;
        }

        return response()->json($response, $code);
    }
}
