<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class ajaxData extends Controller
{
    function index(){
        return view('userData.index');
    }
    function getusers(){
        $teachers = Teacher::get();
        $data = ['data', $teachers];
        return json_encode(array('data' => $teachers));
    }
}
