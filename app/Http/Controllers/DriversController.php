<?php

namespace App\Http\Controllers;

use App\Actions\DriversArrayAction;
use App\Http\Resources\DriverListResource;
use App\Http\Resources\DriverRetrieveResource;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Request;
use JetBrains\PhpStorm\NoReturn;
use OpenApi\Annotations as OA;


class DriversController extends Controller
{
    protected DriversArrayAction $drivers;

    public function __construct()
    {
        $this->drivers = new DriversArrayAction('storage/app/driversData');
    }

     /**
     *
     * Get API
     * @OA\Get (
     *     path="/api/v1/report/format=json",
     *     tags={"report"},
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 type="array",
     *                 property="rows",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(
     *                         property="id",
     *                         type="number",
     *                         example="1"
     *                     ),
     *                     @OA\Property(
     *                         property="name",
     *                         type="string",
     *                         example="example title"
     *                     ),
     *                     @OA\Property(
     *                         property="score",
     *                         type="string",
     *                         example="example content"
     *                     ),
     *                     @OA\Property(
     *                         property="team",
     *                         type="string",
     *                         example="2021-12-11T09:25:53.000000Z"
     *                     ),
     *                 )
     *             )
     *         )
     *     )
     * )
     */

    public function list(): DriverListResource
    {
        return new DriverListResource($this->drivers);
    }


    public function retrieve(): DriverRetrieveResource
    {
        JsonResource::$wrap = 'data';

        return new DriverRetrieveResource($this->drivers);
    }


}
