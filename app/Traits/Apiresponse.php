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
  
   return $this->Successresponse(['data'=>$collection],$code);

}
protected function Showone(Collection $collection, $code = 200){
  
   
    return $this->Successresponse(['data'=>$collection],$code);
 
 }

}