<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $catProducts = $this->products;

        $returnData = [
            'id' => $this->id,
            'link' => route('categories.show', $this->slug),
            'name' => $this->name
        ];

        if($catProducts->count() > 0){
            $returnData['products'] = ProductResource::collection($catProducts);
        };

        return $returnData;
    }
}
