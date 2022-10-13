<?php

namespace App\Http\Controllers;

use App\Models\Upazila;
use Illuminate\Http\Request;


class UpazilaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $upazilas = Upazila::orderBy('name')->get();
        return view('admin.upazila.index', ['upazilas' => $upazilas]);
    }

    public function create()
    {
        return view('admin.upazila.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100|min:2',
            'district' => 'required|numeric'
        ]);

        $upazila = new Upazila();

        $upazila->name = $request->name;
        $upazila->district_id = $request->district;

        $upazila->save();

        return redirect()->route('admin.upazila.index')->with('success', 'New Upazila has been added successfully.');
    }

    public function destroy(Upazila $upazila)
    {
        $upazila->delete();
        return redirect()->route('admin.upazila.index');
    }
}
