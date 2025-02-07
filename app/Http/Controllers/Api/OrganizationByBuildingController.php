<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\OrganizationService;
use Illuminate\Http\Request;



class OrganizationByBuildingController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/organizations/building/{buildingId}",
     *     tags={"Organizations"},
     *     summary="Get organizations by building",
     *     description="Returns a list of organizations in the specified building.",
     *     security={{"bearer":{}}},
     *     @OA\Parameter(
     *         name="buildingId",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="List of organizations"
     *     )
     *
     * )
     */

    protected $organizationService;

    public function __construct(OrganizationService $organizationService)
    {
        $this->organizationService = $organizationService;
    }


    public function __invoke($buildingId)
    {
        $organizations = $this->organizationService->getByBuilding($buildingId);
        return response()->json($organizations);
    }
}
