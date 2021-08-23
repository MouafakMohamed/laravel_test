<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class dashboard extends Controller
{
    public function __construct()
    {
        Carbon::setlocale('fr');
        $this->middleware('Permission:class,modifier', ['only' => 'class']);
        $this->middleware('Permission:class,voir', ['only' => 'class1']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('staff.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function class()
    {
        return 'class => modifier';
    }

    public function class1()
    {
        return 'class => voir';
    }
}
