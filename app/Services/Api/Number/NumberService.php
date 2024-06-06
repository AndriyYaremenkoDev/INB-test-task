<?php

namespace App\Services\Api\Number;


use App\Models\Number;
use Illuminate\Support\Str;
use App\Contracts\Api\Number\NumberServiceInterface;

class NumberService implements NumberServiceInterface
{
    public function generate(): Number
    {
        $number = Number::create([
            'number' => rand(1, 100),
        ]);

        return $number;
    }

    public function retrieve(int $id): Number
    {
        return Number::findOrFail($id);
    }
}