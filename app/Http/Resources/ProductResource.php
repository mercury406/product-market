<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $returnData = [
            'id' => $this->id,
            'name' => $this->name,
            'link' => route('products.show', $this->slug),
            'description' => $this->description,
            'price' => (int) $this->price,
            'category' => $this->category_id
        ];
        return $returnData;
    }
}
