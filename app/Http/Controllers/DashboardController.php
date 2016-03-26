<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use App\Http\Requests;

class DashboardController extends Controller
{
    public function index()
    {
//        Session::put("da", "ne");
        return view('dashboard.index');
    }
}
