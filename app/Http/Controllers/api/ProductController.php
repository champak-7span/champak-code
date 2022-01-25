<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Product\Product;
use App\Http\Requests\Product\Productupdate;
use App\Services\Productservice;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Product\Collection as ProductCollection;
use App\Http\Resources\Product\Resource as ProductResource;



class ProductController extends Controller
{
    private $productService;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(ProductService $productService)
    {
      
        $this->productService = $productService;   
    }

  
    public function index(Request $request)
    {
      
        $products = $this->productService->collection($request->all());
        return new ProductCollection($products);
    }

    public function store(Product $request)
    {
     
       $products = $this->productService->store($request->all());
       return new ProductResource($products);
    }

    public function show($id)
    {
        //relationship is an issue just Product data is get.
        $product = $this->productService->resource($id);
      
        return new ProductResource($product);
    }

    public function update($id,Productupdate $request){
      
        $product = $this->productService->update($id, $request->all());
        return new ProductResource($product);
    }

    public function destroy($id, Request $request)
    {

        $product = $this->productService->delete($id);
        return $this->Successmessage($product['success']);
    }
    
    
}
