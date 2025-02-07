<?php

use App\Http\Controllers\Api\OrganizationByActivityController;
use App\Http\Controllers\Api\OrganizationByBuildingController;
use App\Http\Controllers\Api\OrganizationByLocationController;
use App\Http\Controllers\Api\OrganizationController;
use App\Http\Controllers\Api\OrganizationSearchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/organizations/building/{buildingId}', OrganizationByBuildingController::class);
Route::get('/organizations/activity/{activityId}', OrganizationByActivityController::class);
Route::get('/organizations/location', OrganizationByLocationController::class);
Route::get('/organizations/search', OrganizationSearchController::class);
Route::get('/organizations/{id}', OrganizationController::class);

