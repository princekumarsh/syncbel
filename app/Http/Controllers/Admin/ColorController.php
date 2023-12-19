<?php

namespace App\Http\Controllers\Admin;

use App\CPU\Helpers;
use App\Http\Controllers\Controller;
use App\Model\Color;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class ColorController extends Controller
{
    public function index(Request $request)
    {
        $query_param = [];
        $search = $request['search'];

        if ($request->has('search')) {
            $key = explode(' ', $request['search']);
            $attributes = Color::where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->Where('name', 'like', "%{$value}%");
                }
            });

            $query_param = ['search' => $request['search']];
        } else {
            $attributes = new Color();
        }
        $attributes = $attributes->latest()->paginate(Helpers::pagination_limit())->appends($query_param);
        return view('admin-views.color.view', compact('attributes', 'search'));
    }

    public function store(Request $request)
    {   //dd($request->all());
        $attribute = new Color();
        $attribute->name = str_replace(' ', '', $request->name); 
        $attribute->code = $request->code;
        $attribute->save();

        Toastr::success('Color added successfully!');
        return back();
    }

    public function edit($id)
    {
        $attribute = Color::withoutGlobalScope('translate')->where('id', $id)->first();
        return view('admin-views.color.edit', compact('attribute'));
    }

    public function update(Request $request)
    {
        $attribute = Color::find($request->id);
        $attribute->name = str_replace(' ', '', $request->name);
        $attribute->code = $request->code;
        $attribute->save();


        Toastr::success('Color updated successfully!');
        return redirect()->route('admin.color.view');
    }

    public function delete(Request $request)
    {

        Color::destroy($request->id);
        return response()->json();
    }

    public function fetch(Request $request)
    {
        if ($request->ajax()) {
            $data = Color::orderBy('id', 'desc')->get();
            return response()->json($data);
        }
    }
}