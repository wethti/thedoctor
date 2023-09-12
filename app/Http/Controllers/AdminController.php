<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menutab;
use App\Models\Section;
use App\Models\Subsection;
use App\Models\Page;

class AdminController extends Controller
{ 
    public function index(){
        $menutabs = Menutab::with('sections.subsections')->orderBy('position', 'asc')->get();
        $pages = Page::all();
        return view('admin.index')->with(['menutabs'=> $menutabs, 'pages' => $pages]);
    }

    public function pages(){
        $pages = Page::all();
        return view('admin.pages')->with('pages', $pages);
    }

    public function test() {
        return view('test');   
    }
}