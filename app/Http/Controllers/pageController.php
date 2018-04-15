<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageController extends Controller
{



public function index() {
return view("pages.index");
}


public function about() {
    return view("pages.about");
    }



    public function hitit() {
        return view("pages.hitit");
        }




}
