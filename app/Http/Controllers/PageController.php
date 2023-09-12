<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function store(){
        $data = request()->validate([
            'title' => 'required|string',
            'route' => 'string',
            'menutab' => 'boolean',
            'section' => 'boolean',
            'subsection' => 'boolean',
        ]);
        $page = Page::create($data);
    }

    public function update(Request $request)
    {
        if ($request->ajax()) {
            Page::find($request->pk)->update([
                $request->name => $request->value
            ]);
            return response()->json(['success' => true]);
        }
    }

    public function delete(Request $request)
    {
        if ($request->ajax()) {
            Page::find($request->id)->delete();
            return response()->json(['success' => true]);
        }
    }
}
