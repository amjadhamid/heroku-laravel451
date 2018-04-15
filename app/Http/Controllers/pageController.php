<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageController extends Controller
{

// include argument withthe Controllers
// then in layout and pages you can do any thing
// in the router you just connect the controller with view

public function index() {
    $name='index';
return view("pages.index" )->with('name',$name);
}


public function about() {
    $name='about';

    return view("pages.about")->with('name',$name);
    }



    public function hitit() {
        $desc=array ('name'=>'hitit' , 'language'=> 'turkch');

        return view("pages.hitit")->with('desc',$desc);
        }




}
