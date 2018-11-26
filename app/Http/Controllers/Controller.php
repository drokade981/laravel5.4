<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function response($status=true,$message,$other_option= array())
    {
        $response = array(
            "code" => $status ? "1" : "0",			
            "message" => $message
        );	
        if(!empty($other_option)){
            foreach ($other_option as $key => $value) {
                $response[$key] = $value;
            }
        }
        echo json_encode($response);
    }
}
