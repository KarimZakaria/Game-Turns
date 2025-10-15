<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GameTurnResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'turns' => collect($this->resource)->map(function ($players, $index) {
                return [
                    "turn_number" => $index + 1,
                    'players' => $players,
                ];
            }),
        ];
    }
}
