<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Type;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->types = Type::latest()->get();
        $this->featuredProperties = Property::latest()->limit(6)->get();
        $this->rentProperties = Property::where('purpose', 'rent')->latest()->limit(6)->get();
        $this->sellProperties = Property::where('purpose', 'sell')->latest()->limit(6)->get();
    }

    public function index()
    {
        return view('front.home', [
            'types' => $this->types,
            'featuredProperties' => $this->featuredProperties,
            'rentProperties' => $this->rentProperties,
            'sellProperties' => $this->sellProperties,
        ]);
    }
}
