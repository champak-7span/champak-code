<?php
namespace App\Services;

use App\Models\Order;

class OrderService
{
    private $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function collection($inputs = null)
    {
       return $this->order->getQB()->get();
    }
}