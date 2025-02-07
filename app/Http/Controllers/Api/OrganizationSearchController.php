<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\OrganizationService;
use Illuminate\Http\Request;

class OrganizationSearchController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/organizations/search",
     *     tags={"Organizations"},
     *     summary="Search organizations by name",
     *     description="Returns a list of organizations whose name contains the specified query.",
     *     security={{"bearer":{}}},
     *     @OA\Parameter(
     *         name="query",
     *         in="query",
     *         required=true,
     *         description="Part of the organization name to search",
     *         @OA\Schema(type="string", example="Anderson")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="List of found organizations"
     *
     *     )
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

        $query = $request->input('query');
        $organizations = $this->organizationService->searchByName($query);
        return response()->json($organizations);
    }
}
