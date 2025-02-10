<?php
namespace App\Http\Controllers;
class HelloLaravelController extends Controller{
    public function home(){
        return response()->view('home');
    }
}