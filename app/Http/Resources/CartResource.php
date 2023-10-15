<?php

namespace App\Http\Resources;

use App\Http\Resources\Auth\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user_id'     => $this->user_id,
            'number'      => $this->number,
            'status'      => $this->status,
            'total_price' => $this->total_price,
            'product'     => ProductResource::make($this->whenLoaded('product')),
            'user'        => UserResource::make($this->whenLoaded('user')),
        ];
    }
}
