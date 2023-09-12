<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    public function index(){
        // App::setLocale('uk');
        return view('about');
    }

    public function find(){
        return view('info.find');
    }

    public function ingredients(){
        $accordions = json_decode(File::get(resource_path('views/info/ingredients.json')), true);
        return view('info.ingredients', ['accordions' => $accordions]);
    }

    public function contacts(){
        return view('contacts');
    }
    
    public function partner(){
        return view('info.partner');
    }
}
