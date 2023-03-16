<?php

namespace App\Schemas\Admin;

/**
 * @OA\Schema(
 *     title="CountryResource",
 *     description="Country resource",
 *     @OA\Xml(
 *         name="CountryResource"
 *     )
 * )
 */
class CountryResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var Country[]
     */
    private $data;
}
