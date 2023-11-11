<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SparePartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"              => $this->id,
            "reference"       => $this->reference,
            "designation"     => $this->designation,
            "price"           => $this->price,
            "brand"           => $this->brand,
            "category"        => $this->category,
            "description"     => $this->description,
            "is_featured"     => $this->is_featured,
            "pictures"        => PictureResource::collection($this->pictures)
        ];
    }
}
