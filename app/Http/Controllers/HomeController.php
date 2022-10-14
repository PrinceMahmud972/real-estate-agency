<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Type;
use App\Models\Upazila;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->types = Type::get();
        $this->upazilas = Upazila::has('properties')
            ->with(['properties', 'district' => function ($query) {
                $query->with('division');
            }])
            ->get();
    }

    public function index()
    {
        $featuredProperties = Property::latest()->limit(6)->get();
        $rentProperties = Property::where('purpose', 'rent')->latest()->limit(6)->get();
        $sellProperties = Property::where('purpose', 'sell')->latest()->limit(6)->get();

        return view('front.home', [
            'types' => $this->types,
            'upazilas' => $this->upazilas,
            'featuredProperties' => $featuredProperties,
            'rentProperties' => $rentProperties,
            'sellProperties' => $sellProperties,
        ]);
    }

    public function propertyIndex()
    {
        $properties = Property::filter()->latest()->paginate(15)->withQueryString();
        return view('front.property.index', [
            'properties' => $properties,
            'types' => $this->types,
            'upazilas' => $this->upazilas
        ]);
    }

    public function propertyShow(Property $property)
    {
        return view('front.property.show', ['property' => $property]);
    }
}
