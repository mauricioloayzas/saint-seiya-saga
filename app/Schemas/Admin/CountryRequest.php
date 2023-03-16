<?php

namespace App\Schemas\Admin;

/**
 * @OA\Schema(
 *      title="Store Country request",
 *      description="Store Country request body data",
 *      type="object",
 *      required={"name","code"}
 * )
 */
class CountryRequest
{
    /**
     * @OA\Property(
     *      title="Name",
     *      description="Name of the new country",
     *      example="A nice country"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="Code",
     *      description="Code of the new country",
     *      example="A nice CO"
     * )
     *
     * @var string
     */
    public $code;
}
