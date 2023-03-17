<?php

namespace App\Schemas\Admin;

/**
 * @OA\Schema(
 *     title="CityResource",
 *     description="City resource",
 *     @OA\Xml(
 *         name="CityResource"
 *     )
 * )
 */
class CityResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var City[]
     */
    private $data;
}
