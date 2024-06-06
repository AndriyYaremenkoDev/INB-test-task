<?php

namespace App\Http\Resources\Number;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NumberRetrieveResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'number' => $this->number
        ];
    }
}
