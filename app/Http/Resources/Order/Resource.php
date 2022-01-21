<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Order\Collection as OrderCollection;
use App\Traits\ResourceFilterable;

class Resource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    use ResourceFilterable;
    protected $model = 'Order';

    public function toArray($request)
    {
        $data =  $this->fields();
        $data['products'] = new OrderCollection($this->whenLoaded('products'));
        return $data;
    }
}
