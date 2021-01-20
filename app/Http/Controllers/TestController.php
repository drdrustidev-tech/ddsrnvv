<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //


    public function testone()
    {
        return view('layouts.includes.testcontent');
    }

    public function testtwo()
    {
        return view('test.testtwo');
    }
    public function testthree()
    {
        return view('test.testthree');
    }

}
