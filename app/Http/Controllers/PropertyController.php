<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PropertyController extends Controller
{

    function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() {
        $properties = Property::with('upazila')->get();
        return view('admin.property.index', ['properties' => $properties]);
    }

    public function create() {
        return view('admin.property.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'type' => 'required|numeric',
            'upazila' => 'required|numeric',
            'purpose' => 'required|alpha',
            'size' => 'required|numeric',
            'bedroom' => 'numeric|nullable',
            'bathroom' => 'numeric|nullable',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $property = new Property();

        $property->name = $request->name;
        $property->type_id = $request->type;
        $property->address_id = $request->upazila;
        $property->purpose = $request->purpose;
        $property->size = $request->size;
        $property->bedroom = $request->bedroom;
        $property->bathroom = $request->bathroom;
        $property->price = $request->price;
        $property->image = $this->uploadImage($request->image);

        $property->save();

        return redirect()->route('admin.property.index')->with('success', 'Property has beed added');

    }

    public function edit(Property $property) {
        return view('admin.property.edit', ['property' => $property]);
    }

    public function update(Request $request, Property $property) {
        $request->validate([
            'name' => 'required',
            'type' => 'required|numeric',
            'upazila' => 'numeric',
            'purpose' => 'required|alpha',
            'size' => 'required|numeric',
            'bedroom' => 'numeric|nullable',
            'bathroom' => 'numeric|nullable',
            'price' => 'required|numeric',
        ]);

        $property->name = $request->name;
        $property->type_id = $request->type;
        $property->address_id = $request->upazila;
        $property->purpose = $request->purpose;
        $property->size = $request->size;
        $property->bedroom = $request->bedroom;
        $property->bathroom = $request->bathroom;
        $property->price = $request->price;

        if($request->image) {
            $request->validate([
                'image' => 'image|mimes:png,jpg,jpeg|max:2048'
            ]);

            $this->removeImage($property->image);

            $property->image = $this->uploadImage($request->image);
        }

        $property->save();

        return redirect()->route('admin.property.index')->with('success', 'property has been updated');
    }

    public function destroy(Property $property) {

        // remove the image
        $this->removeImage($property->image);

        $property->delete();

        return redirect()->route('admin.property.index')->with('success', 'property has been deleted');
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
