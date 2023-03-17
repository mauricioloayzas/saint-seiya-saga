<?php

namespace App\Schemas\Admin;

/**
 * @OA\Schema(
 *      title="Store City request",
 *      description="Store City request body data",
 *      type="object",
 *      required={"name","code"}
 * )
 */
class CityRequest
{
    /**
     * @OA\Property(
     *      title="Name",
     *      description="Name of the new city",
     *      example="A nice city"
     * )
     *
     * @var string
     */
    public $name;
}
