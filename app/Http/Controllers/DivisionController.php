<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{


    public function getDistrictAjax($id) {
        $districts = Division::find($id)->districts()->get();
        return json_encode($districts);
    }
}
