<?php

namespace App\Http\Controllers\api;

use App\Traits\Apiresponse;
use Illuminate\Http\Request;
use App\Services\OrderService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\Order\Resource as orderResource;
use App\Http\Resources\Order\Collection as orderCollection;

class OrderController extends Controller
{
    private $orderService;
    use Apiresponse;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }
    public function index(Request $request)
    {
        $orders = $this->orderService->collection($request->all());
        return $this->collection(new orderCollection($orders));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
