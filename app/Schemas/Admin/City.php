<?php

namespace App\Schemas\Admin;

/**
 * @OA\Schema(
 *     title="City",
 *     description="City model",
 *     @OA\Xml(
 *         name="City"
 *     )
 * )
 */
class City
{
    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $id;

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

    /**
     * @OA\Property(
     *      title="Status",
     *      description="Status of the new city",
     *      example="A!I"
     * )
     *
     * @var string
     */
    public $status;
}
