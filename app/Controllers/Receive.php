<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use \App\Models\Sms;
use Exception;

class Receive extends ResourceController
{
    //Constructor
    private $smsModel;
    public function __construct()
    {
        $this->smsModel=new Sms();
    }

    //Api
   public function receiveSms()
   {
    $validation = [
        "body" => [
            "rules" => "required",
            "errors" => [
                "required" => 'Missing sms body',

            ]
        ],
        "center_number" => [
            "rules" => "required",
            "errors" => [
                "required" => "Center Number Missing"
            ]
        ],
        "from_number" => [
            "rules" => "required",
            "errors" => [
                "required" => "Missing"
            ]
        ],
    ];


    if (!$this->validate($validation)) {
        return $this->setResponse('0', true, $this->validator->getErrors());
    }

    try{
        $this->smsModel->save($this->request->getVar());
        return $this->setResponse('1', false,"Sms Received");
    }catch(Exception $ex)
    {
        return $this->setResponse('0', true, $ex->getMessage());
    }
   } 


     //Send Response
     private function setResponse($code, $error, $payload)
     {
         $res = [
             'code' => $code, //1 means validate problem
             "errors" => $error,
             "payload" => $payload,
         ];
 
         return $this->response
             ->setStatusCode(200)
             ->setContentType('application/json')
             ->setJSON($res);
     }
  
}
