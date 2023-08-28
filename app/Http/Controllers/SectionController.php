<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;

class SectionController extends Controller
{ 

    public function store(){
        $data = request()->validate([
            'title' => 'required|string',
            'description' => 'string',
            'position' => 'integer',
            'menutab_id' => 'integer',
        ]);
        $section = Section::create($data);
    }

    public function duplicate($id){
        $section = Section::find($id);
        $newSection = $section->replicate();
        $newSection->save();
        return redirect()->route('admin.index');
    }

    public function update(Request $request)
    {
        if ($request->ajax()) {
            Section::find($request->pk)->update([
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