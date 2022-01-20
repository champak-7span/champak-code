<?php
namespace App\Traits;
use Illuminate\Support\Collection;

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
     
    // $transformer = $collection->first()->transformer;
    // $collection=$this->Transformdata($collection,$transformer);
    return $this->Successresponse(['data'=>$collection],$code);

}
protected function Showone(Collection $collection, $code = 200){
    return $this->Successresponse(['data'=>$collection],$code);
 
 }

protected function success($data, $code){
    return response()->json($data, $code);
}

protected function error($data, $code = 400)
{   
    // return response()->json(['error'=>$message,'code'=>$code], $code);
    return response()->json($data, $code);
}


 // fractal erorr is geting 
//  protected  function Transformdata($data, $transformer){
//      $transformermation = fractal($data, new $transformer);
//      return $transformermation->toArray();

//  }
}