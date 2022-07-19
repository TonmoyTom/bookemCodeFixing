<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Response;

/**
 * @SWG\Swagger(
 *   basePath="/api/v1",
 *   @SWG\Info(
 *     title="Laravel Generator APIs",
 *     version="1.0.0",
 *   )
 * )
 * This class should be parent class for other API controllers
 * Class AppBaseController
 */
class ApiBaseController extends Controller
{
    public function sendResponse($result, $message="success", $code = 200)
    {
        return Response::json([
            'data' => $result,
            'message' => $message
        ], $code);
    }

    public function sendError($error, $code = 404)
    {
        return Response::json([
            'error' => true,
            'message' => $error
        ], $code);
    }

    public function sendSuccess($message, $code = 200)
    {
        return Response::json([
            'success' => true,
            'message' => $message
        ], 200);
    }
}
