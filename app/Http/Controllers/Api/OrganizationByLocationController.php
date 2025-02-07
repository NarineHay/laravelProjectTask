<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\OrganizationService;
use Illuminate\Http\Request;

class OrganizationByLocationController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/organizations/location",
     *     tags={"Organizations"},
     *     summary="Get a list of organizations within a rectangular area",
     *     description="Returns a list of organizations located within a specified rectangular zone defined by center and size.",
     *     security={{"bearer":{}}},
     *     @OA\Parameter(
     *         name="latitude",
     *         in="query",
     *         required=true,
     *         description="Area center latitude",
     *         @OA\Schema(type="number", format="float", example=55.75)
     *     ),
     *     @OA\Parameter(
     *         name="longitude",
     *         in="query",
     *         required=true,
     *         description="Longitude of the area center",
     *         @OA\Schema(type="number", format="float", example=37.61)
     *     ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="List of organizations"
     *     ),
     *
     * )
     */

    protected $organizationService;

    public function __construct(OrganizationService $organizationService)
    {
        $this->organizationService = $organizationService;
    }


    public function __invoke(Request $request)
    {
        $data = $request->all();

        $organizations = $this->organizationService->getOrganizationsByRectangle($data);
        return response()->json($organizations);
    }

}
