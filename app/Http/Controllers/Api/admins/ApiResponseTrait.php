<?php
namespace app\Http\Controllers\Api;
 /**
  * 
  */
 trait ApiResponseTrait
 {
   public function ApiResponse($data=null , $message=null ,$status=null){
    $array =[
        'data'=>$data,
        'message'=>$message,
        'status'=>$status
     ];
     return response($array,$status);
   }
 }
 