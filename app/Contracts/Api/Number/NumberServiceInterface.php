<?php

namespace App\Contracts\Api\Number;

use App\Models\Number;

interface NumberServiceInterface
{
    public function generate(): Number;
    public function retrieve(int $id): Number;
}