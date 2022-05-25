<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Type;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {
        $types = Type::latest()->get();
        $featuredProperties = Property::latest()->limit(6)->get();
        $rentProperties = Property::where('purpose', 'rent')->latest()->limit(6)->get();
        $sellProperties = Property::where('purpose', 'sell')->latest()->limit(6)->get();

        return view('front.home', [
            'types' => $types,
            'featuredProperties' => $featuredProperties,
            'rentProperties' => $rentProperties,
            'sellProperties' => $sellProperties,
        ]);
    }

    public function propertyIndex(Request $request) {

        $properties = Property::filter()->latest()->paginate(1)->withQueryString();
        return view('front.property.index', ['properties' => $properties]);
    }

    public function propertyShow(Property $property) {
        return view('front.property.show', ['property' => $property]);
    }
}
