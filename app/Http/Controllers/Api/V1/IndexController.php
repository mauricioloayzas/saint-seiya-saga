<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
* @OA\Info(title="API Index", version="1.0")
*
* @OA\Server(url="http://saint-seiya.test")
*/
class IndexController extends Controller
{
    /**
    * @OA\Get(
    *     path="/api/v1/index",
    *     summary="Index test",
    *     tags={"Index"},
    *     @OA\Response(
    *         response=200,
    *         description="Index test."
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
    */
    public function index()
    {
        return json_encode([
            0 => [
                'id' => 0,
                'name'  => "test"
            ],
            0 => [
                'id' => 1,
                'name'  => "other test"
            ]
        ]);
    }
}
