<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JsonAjaxController extends Controller
{
    public function index(){
        // $data = array(
        //     'name' => 'harry',
        //     'class' => '12th',
        // );
        // $data = [
        //     'name' => 'harry',
        //     'calss' => 'dont know',
        // ];

        return view('jsonandAjax');
    }

}
