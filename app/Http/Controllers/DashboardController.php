<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use App\Http\Requests;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
}
