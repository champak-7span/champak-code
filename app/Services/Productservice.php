<?php
namespace App\Services;

use App\Models\Product;
use DB;
use Illuminate\Support\Facades\Auth;

class Productservice
{

        protected $product = null;

        public function __construct(Product $product)
        {

         $this->product = $product;
        }

        public function store($inputs)
        {
            
            $product = $this->product->create($inputs);
            return $product;
        }
        public function collection($inputs=null)
        {
          
           return $this->product->getQB()->get();
        }
       

        public function resource($id){
        
            $product = $this->product->getQB()->findorfail($id);
            if (!empty($product)) {
                return $product;
            } else {
                return ['error' => ['Product is not found.']];
            }
        }

        public function update($id, $inputs){
            $product = $this->resource($id);
            if(isset($product['error'])){
                return $product;
            }
            $product->update($inputs);
            return $product;
        }
        public function delete($id){

            $product = $this->resource($id);
            if(isset($product['error'])){
                return $product;
            }
            $product = $product->delete();
            return ['success' => 'Product deleted'];
        }


    

}