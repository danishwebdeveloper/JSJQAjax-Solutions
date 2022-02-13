<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JsonAjaxController extends Controller
{
    public function index(){
        return view('jsonandAjax');
    }
}
