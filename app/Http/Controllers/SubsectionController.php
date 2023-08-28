<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subsection;
use App\Models\Section;

class SubsectionController extends Controller
{ 
    public function index(){
        $subsections = Subsection::all();
        return view('subsection.index')->with('subsections', $subsections);
    }

    public function create() {
        return view('subsection.create');
        
    }

    public function store(){
        $data = request()->validate([
            'title' => 'required|string',
            'description' => 'string',
            'position' => 'integer',
            'section_id' => 'integer',
        ]);
        $subsection = Subsection::create($data);
        return redirect()->route('subsection.index');
    }

    public function update(Request $request)
    {
        if ($request->ajax()) {
            Subsection::find($request->pk)->update([
                $request->name => $request->value
            ]);
            return response()->json(['success' => true]);
        }
    }

    public function delete(Request $request)
    {
        if ($request->ajax()) {
            Section::find($request->id)->delete();
            return response()->json(['success' => true]);
        }
    }
}
