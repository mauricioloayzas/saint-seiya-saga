<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CityRequest;
use App\Http\Resources\Admin\CityResource;
use App\Models\City;
use App\Http\Requests\Admin\CountryRequest;
use App\Http\Resources\Admin\CountryResource;
use App\Models\Country;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/admin/country/{id}/city",
     *      operationId="getCitiesList",
     *      tags={"Cities"},
     *      summary="Get list of cities",
     *      description="Returns list of cities",
     *     @OA\Parameter(
     *          name="id",
     *          description="Country id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/CityResource")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function index(int $id)
    {
        /** @var Country $country */
        $country = Country::find($id);
        return new CityResource($country->cities);
    }


    /**
     * @OA\Post(
     *      path="/api/v1/admin/country/{id}/city",
     *      operationId="storeCity",
     *      tags={"Cities"},
     *      summary="Store new country",
     *      description="Returns country data",
     *     @OA\Parameter(
     *          name="id",
     *          description="Country id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/CityRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/City")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     *
     * @param CityRequest $request
     * @param int  $id
     * @return JsonResponse
     */
    public function store(CityRequest $request, int $id)
    {
        $country = Country::find($id);
        $city = $country->cities()->create($request->all());

        return (new CityResource($city))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }


    /**
     * @OA\Get(
     *      path="/api/v1/admin/country/{countryId}/city/{id}",
     *      operationId="getCityById",
     *      tags={"Cities"},
     *      summary="Get country information",
     *      description="Returns country data",
     *     @OA\Parameter(
     *          name="countryId",
     *          description="Country id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="id",
     *          description="City id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/City")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     *
     * @param int $id
     * @param int $countryId
     * @return CountryResource
     */
    public function show(int $countryId, int $id)
    {
        $city = City::where('id', $id)->first();
        return new CityResource($city);
    }


    /**
     * @OA\Put(
     *      path="/api/v1/admin/country/{countryId}/city/{id}",
     *      operationId="updateCity",
     *      tags={"Cities"},
     *      summary="Update existing country",
     *      description="Returns updated country data",
     *      @OA\Parameter(
     *          name="countryId",
     *          description="Country id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="id",
     *          description="city id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/CityRequest")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/City")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     *
     * @param CityRequest $request
     * @param int $countryId
     * @param int $id
     * @return JsonResponse
     */
    public function update(CityRequest $request, int $countryId, int $id)
    {
        $city = City::find($id);
        $city->update($request->all());

        return (new CityResource($city))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }


    /**
     * @OA\Delete(
     *      path="/api/v1/admin/country/{countryId}/city/{id}",
     *      operationId="deleteCity",
     *      tags={"Cities"},
     *      summary="Delete existing country",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="countryId",
     *          description="Country id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="id",
     *          description="City id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     *
     * @param int $countryId
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $countryId, int $id)
    {
        $city = City::find($id);
        $city->update(['status'  => 'I']);

        return (new CityResource($city))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }
}
