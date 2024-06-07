<?php

namespace App\Services\Api\Number;


use App\Models\Number;
use App\Contracts\Api\Number\NumberServiceInterface;

class NumberService implements NumberServiceInterface
{
    protected $numberModel;

    public function __construct(Number $numberModel)
    {
        $this->numberModel = $numberModel;
    }

    public function generate(): Number
    {
        $number = $this->numberModel->create([
            'number' => rand(1, 100),
        ]);
        return $number;
    }

    public function retrieve(int $id): Number
    {
        return $this->numberModel->findOrFail($id);
    }
}