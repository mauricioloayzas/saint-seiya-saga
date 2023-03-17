<?php

namespace App\Schemas\Admin;

/**
 * @OA\Schema(
 *     title="Country",
 *     description="Country model",
 *     @OA\Xml(
 *         name="Country"
 *     )
 * )
 */
class Country
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

    /**
     * @OA\Property(
     *      title="Status",
     *      description="Status of the new country",
     *      example="A!I"
     * )
     *
     * @var string
     */
    public $status;
}
