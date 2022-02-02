<?php
namespace App\Traits;
use Illuminate\Support\Collection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

trait Apiresponse
{

private function Successresponse($data,$code){
    return response()->json($data, $code);
}
protected function Erroresponse($message,$code){
   
    return response()->json(['error'=>$message,'code'=>$code], $code);
}
protected function Successmessage($message,$code = 200){
   
    return response()->json(['message'=>$message,'code'=>$code], $code);
}

protected function Showall(Collection $collection, $code = 200){
    return $this->Successresponse(['data'=>$collection],$code);
}
protected function Showone(Collection $collection, $code = 200){
    return $this->Successresponse(['data'=>$collection],$code); 
 }
 
 private function resource(JsonResource $resource, $code = 200)
 {
     return $this->success($resource, $code);
 }

protected function success($data, $code){
    return response()->json($data, $code);
}

protected function error($data, $code = 400)
{   
    return response()->json($data, $code);
}
private function collection(ResourceCollection $collection, $code = 200)
{
    return $collection;
}


 // fractal erorr is geting 
//  protected  function Transformdata($data, $transformer){
//      $transformermation = fractal($data, new $transformer);
//      return $transformermation->toArray();

//  }
}