<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Twitter;

use App\Http\Requests;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function search(Request $request) {
        $q = $request->get("q");
        $twitterFeed =  Twitter::query("search/tweets","GET", array("q" => $q, 'count' => 50));



        return view("search_results", ["results" => $twitterFeed->statuses]);
    }
}
