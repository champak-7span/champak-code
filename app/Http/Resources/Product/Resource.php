<?php

namespace App\Http\Resources\Product;
use App\Traits\ResourceFilterable;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Product\Collection as ProductCollection;

class Resource extends JsonResource
{
    use ResourceFilterable;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    protected $model = 'Product';
    public function toArray($request)
    {
        
        $data =  $this->fields();
        
        $data['orders'] = new ProductCollection($this->whenLoaded('orders'));
        return $data;
    }
}
