<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Number\NumberGenerateResource;
use App\Http\Resources\Number\NumberRetrieveResource;
use App\Contracts\Api\Number\NumberServiceInterface;
use App\Http\Requests\Api\Number\NumberRetrieveRequest;

class NumberController extends Controller
{
    protected $numberService;

    public function __construct(NumberServiceInterface $numberService)
    {
        $this->numberService = $numberService;
    }

    public function generate()
    {
        $number = $this->numberService->generate();

        return new NumberGenerateResource($number);
    }

    public function retrieve(NumberRetrieveRequest $request)
    {
        $params = $request->validated();
        $id = $params['id'];
        $number = $this->numberService->retrieve($id);

        return new NumberRetrieveResource($number);
    }
}
