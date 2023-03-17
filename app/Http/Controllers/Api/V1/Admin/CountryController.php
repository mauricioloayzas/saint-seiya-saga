<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CountryRequest;
use App\Http\Resources\Admin\CountryResource;
use App\Models\Country;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/admin/country",
     *      operationId="getCountriesList",
     *      tags={"Countries"},
     *      summary="Get list of countries",
     *      description="Returns list of countries",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/CountryResource")
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
    public function index()
    {
        return new CountryResource(Country::all());
    }


    /**
     * @OA\Post(
     *      path="/api/v1/admin/country",
     *      operationId="storeCountry",
     *      tags={"Countries"},
     *      summary="Store new country",
     *      description="Returns country data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/CountryRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Country")
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
     * @param CountryRequest $request
     * @return JsonResponse
     */
    public function store(CountryRequest $request)
    {
        $country = Country::create($request->all());

        return (new CountryResource($country))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }


    /**
     * @OA\Get(
     *      path="/api/v1/admin/country/{id}",
     *      operationId="getCountryById",
     *      tags={"Countries"},
     *      summary="Get country information",
     *      description="Returns country data",
     *      @OA\Parameter(
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
     *          @OA\JsonContent(ref="#/components/schemas/Country")
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
     * @return CountryResource
     */
    public function show( int $id)
    {
        $country = Country::find($id);
        return new CountryResource($country);
    }


    /**
     * @OA\Put(
     *      path="/api/v1/admin/country/{id}",
     *      operationId="updateCountry",
     *      tags={"Countries"},
     *      summary="Update existing country",
     *      description="Returns updated country data",
     *      @OA\Parameter(
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
     *          @OA\JsonContent(ref="#/components/schemas/CountryRequest")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Country")
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
     * @param CountryRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(CountryRequest $request, int $id)
    {
        $country = Country::find($id);
        $country->update($request->all());

        return (new CountryResource($country))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }


    /**
     * @OA\Delete(
     *      path="/api/v1/admin/country/{id}",
     *      operationId="deleteCountry",
     *      tags={"Countries"},
     *      summary="Delete existing country",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Country id",
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
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id)
    {
        $country = Country::find($id);
        $country->update(['status'  => 'I']);

        return (new CountryResource($country))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }
}
