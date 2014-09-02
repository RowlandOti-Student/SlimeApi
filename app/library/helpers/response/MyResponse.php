<?php 

  namespace Helpers\Response;

  use Response;
  
  class MyResponse extends Response {

  protected $message;  

  //public static function json($data = Array, $status = 200, $success = false, $message = null) {
  public static function  json($data = array(), $status = 200, array $headers = array(), $options = 0) {

    // check if $message is object and transforms it into an array
    //if (is_object($message)) { $message = $message->toArray(); }

    switch ($status) 
    {
        default:
            $data = $data;
            break;
    }

    // return an error
    return Response::json($data, $status, $headers);
    }
  }