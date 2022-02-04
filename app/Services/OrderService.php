<?php
namespace App\Services;

use App\Models\Order;
use App\Library\Helper;

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

    public function store($inputs = null)
    {
        $products = [
            0 => [
            'product_id' => 2,
            'quantity' => 5
            ],
            1 => [
            'product_id' => 3,
            'quantity' => 6
            ],
            2 => [
            'product_id' => 4,
            'quantity' => 7
            ],
            3 => [
            'product_id' => 5,
            'quantity' => 8
            ]
        ];


        $inputs['order_no'] = Helper::generateOrderNumber();
        $inputs['subtotal'] = 565656;
        $inputs['total'] = 900000;
        $inputs['qty'] = 5;
        $inputs['user_id'] = 1;
        $product_ids = explode(",",$inputs['product_id']);

        $quantities = explode(",",$inputs['quantity']);
      
        $order = $this->order->create($inputs);
        // foreach($products as $product) {
            
            $order->products()->attach($product_ids,['quantity'=>8]);
        // }
        
        return $order;
    }
}