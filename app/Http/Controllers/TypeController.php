<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TypeController extends Controller
{

    function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() {
        $types = Type::all();
        return view('admin.type.index', ['types' => $types]);
    }

    public function create() {
        return view('admin.type.create');
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $image = $this->uploadImage($request->image);

        $type = new Type();
        $type->name = $request->name;
        $type->image = $image;
        $type->save();

        return redirect()->route('admin.type.index')->with('success', 'Type has beed stored successfully');

    }

    public function edit(Type $type) {
        return view('admin.type.edit', ['type' => $type]);
    }

    public function update(Request $request, Type $type) {

        $request->validate([
            'name' => 'required'
        ]);

        if($request->image) {
            $request->validate([
                'image' => 'image|mimes:png,jpg,jpeg|max:2048'
            ]);

            // delete previous image
            $this->removeImage($type->image);

            // upload new image
            $type->image = $this->uploadImage($request->image);
        }

        $type->name = $request->name;
        $type->save();

        return redirect()->route('admin.type.index')->with('success', 'Type has been updated successfully.');
    }

    public function destroy(Type $type) {

        // delete the image
        $this->removeImage($type->image);

        $type->delete();

        return redirect()->route('admin.type.index')->with('success', 'Type has been Deleted.');
    }

    public function uploadImage($image) {
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('img'), $imageName);
        return $imageName;
    }

    public function removeImage($image) {
        if(File::exists(public_path('img/' . $image))) {
            File::delete(public_path('img/' . $image));
        }
    }

}
