<?php

namespace App\Http\Controllers;

use App\Models\Upazila;
use Illuminate\Http\Request;


class UpazilaController extends Controller
{
    public function index()
    {
        $upazilas = Upazila::orderBy('name')->get();
        return view('admin.upazila.index', ['upazilas' => $upazilas]);
    }
}
