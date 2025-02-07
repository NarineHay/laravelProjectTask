<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\OrganizationService;
use Illuminate\Http\Request;

class OrganizationByActivityController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/organizations/activity/{activityId}",
     *     tags={"Organizations"},
     *     summary="Get organizations by activity",
     *     description="Returns a list of organizations in the specified activity.",
     *     security={{"bearer":{}}},
     *     @OA\Parameter(
     *         name="activityId",
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


    public function __invoke($activityId)
    {
        $organizations = $this->organizationService->getByActivity($activityId);
        return response()->json($organizations);
    }


}
