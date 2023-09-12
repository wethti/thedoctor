<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menutab;

class MenutabController extends Controller
{ 
    public function store(){
        $data = request()->validate([
            'title' => 'required|string',
            'description' => 'string',
            'position' => 'integer',
        ]);
        $menutab = Menutab::create($data);

        return response()->json([
            'id' => $menutab->id,
            'title' => $menutab->title,
            'description' => $menutab->description,
            'position' => $menutab->position,
        ]);
    }

    public function update(Request $request)
    {
        if ($request->ajax()) {
            Menutab::find($request->pk)->update([
                $request->name => $request->value
            ]);
            return response()->json(['success' => true]);
        }
    }

    public function delete(Request $request)
    {
        if ($request->ajax()) {
            Menutab::find($request->id)->delete();
            return response()->json(['success' => true]);
        }
    }
}
