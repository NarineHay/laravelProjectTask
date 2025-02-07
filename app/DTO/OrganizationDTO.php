<?php

namespace App\DTO;

class OrganizationDTO
{
    public $id;
    public $name;
    public $buildingId;
    public $activities;
    public $phones;

    public function __construct($id, $name, $buildingId, $activities, $phones)
    {
        $this->id = $id;
        $this->name = $name;
        $this->buildingId = $buildingId;
        $this->activities = $activities;
        $this->phones = $phones;
    }

    public static function fromOrganization($organization)
    {
        return new self(
          $organization->id,
        $organization->name,
  $organization->building_id,
  $organization->activities,
      $organization->phones
        );
    }

}
