<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index() {
        $properties = Property::all();
        return view('admin.property.index', ['properties' => $properties]);
    }

    public function create() {
        return view('admin.property.create');
    }
}
