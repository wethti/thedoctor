<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;

class AboutController extends Controller
{
    public function index(){
        // App::setLocale('uk');
        return view('about');
    }

    public function find(){
        return view('find');
    }

    public function contacts(){
        return view('contacts');
    }
    
    public function partner(){
        return view('partner');
    }
}
