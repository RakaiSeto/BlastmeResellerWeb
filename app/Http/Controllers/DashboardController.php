<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    /**
     * Display dashbnoard demo one of the resource.
     *
     * @return \Illuminate\View\View
     */
    function index(Request $request)
    {
        $title = "Index";
        $description = "Some description for the page";

//        $res = DB::select('SELECT * FROM mt_device WHERE reseller_user_allocation = "' . $request->session()->get('sessionEmail') . '"');

//        dd($res);

        return view('dashboard.index', compact('title', 'description'));
    }

    function socket(Request $request) {

    }
}
