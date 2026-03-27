<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function page1(){
        return view('pages.page1');
    }

    public function page2(){
        return view('pages.page2');
    }

    public function index(){
        return view('template.index');
    }

    public function blog(){
        return view('template.blog');
    }


}
