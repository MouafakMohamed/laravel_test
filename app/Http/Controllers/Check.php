<?php

namespace App\Http\Controllers;

use App\Frai;
use Illuminate\Http\Request;

class Check extends Controller
{
    public function check($id)
    {
        $check = Frai::where('massar', $id)->first();
        if ($check) {
            return view('admin.valide');
        }
        return view('errors.405');
    }
}
