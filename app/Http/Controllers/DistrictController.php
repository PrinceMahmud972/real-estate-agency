<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{

    public function getUpazilaAjax($id) {
        $upazilas = District::find($id)->upazilas()->get();
        return json_encode($upazilas);
    }
}
