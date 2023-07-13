<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        
        //Get Model
        $smsModel=new \App\Models\Sms();
        $result=$smsModel->orderBy('id','desc')->findAll();
        dd($result);
    }
}
