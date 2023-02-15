<?php

namespace App\Http\Resources;

use App\Actions\DriversArrayAction;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

class DriverRetrieveResource extends JsonResource
{
    private array $drivers;

    public function __construct($resource)
    {
        $this->drivers = (new DriversArrayAction('storage/app/driversData'))->handle();
        parent::__construct($resource);
    }

    public function toArray($request): array
    {
        return $this->drivers;
    }
}
