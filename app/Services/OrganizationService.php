<?php

namespace App\Services;

use App\DTO\OrganizationDTO;
use App\Models\Activity;
use App\Models\Organization;



class OrganizationService
{
    public function getByBuilding($buildingId)
    {
        $organizations = Organization::where('building_id', $buildingId)->get();

        return $organizations->map(function ($organization) {
            return OrganizationDTO::fromOrganization($organization);
        });
    }

    public function getByActivity($activityId)
    {
        $activityIds = Activity::where('id', $activityId)
            ->orWhere('parent_id', $activityId)
            ->pluck('id');

        $organizations = Organization::whereHas('activities', function ($query) use ($activityIds) {
            $query->whereIn('activities.id', $activityIds);
        })->get();

        return $organizations->map(function ($organization) {
            return OrganizationDTO::fromOrganization($organization);
        });
    }



    public function getOrganizationsByRectangle($data)
    {
        // 1 degree of latitude ≈ 111 km, so we consider the deviation to be
        $delta = 10 / 111;

        $centerLat = $data['latitude'];
        $centerLng = $data['longitude'];

        $minLat = $centerLat - $delta;
        $maxLat = $centerLat + $delta;
        $minLng = $centerLng - $delta;
        $maxLng = $centerLng + $delta;

        $organizations = Organization::select("organizations.*")
            ->join("buildings", "organizations.building_id", "=", "buildings.id")
            ->whereBetween("buildings.latitude", [$minLat, $maxLat])
            ->whereBetween("buildings.longitude", [$minLng, $maxLng])
            ->get();

        return $organizations->map(function ($organization) {
            return OrganizationDTO::fromOrganization($organization);
        });
    }


    public function searchByName($query)
    {
        $organizations = Organization::where('name', 'LIKE', "%{$query}%")->get();

        return $organizations->map(function ($organization) {
            return OrganizationDTO::fromOrganization($organization);
        });
    }

    public function getById($id)
    {
        $organization = Organization::with(['building', 'activities', 'phones'])->findOrFail($id);
        return OrganizationDTO::fromOrganization($organization);
    }
}
