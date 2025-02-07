<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\OrganizationService;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *     title="Creating a REST API application",
 *     version="1.0",
 *     description="Test task: Creating a REST API application"
 * )
 */

class OrganizationController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/organizations/{id}",
     *     tags={"Organizations"},
     *     summary="Get organizations by id",
     *     description="Returns a organization in the specified id.",
     *     security={{"bearer":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Show organization"     *
     *     )
     *
     * )
     */

    protected $organizationService;
    public function __construct(OrganizationService $organizationService)
    {
        $this->organizationService = $organizationService;
    }

    public function __invoke($id)
    {
        $organization = $this->organizationService->getById($id);
        return response()->json($organization);
    }
}
