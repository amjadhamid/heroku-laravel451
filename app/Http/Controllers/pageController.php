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
public function database() {
    // Schema::create('networks', function(Blueprint  $table)
    // {
    //     $table->increments('id');
    //     $table -> string('name' ,25);
    //     $table -> string('lastname',50);
    //     $table -> string('description',50);
     
    //     $table -> date('created');
    //     $table -> string('fullname');
    //     $table -> timestamps();
    // });
    Schema::create('testusers', function($table)
    {
        $table->increments('id');
    });
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
