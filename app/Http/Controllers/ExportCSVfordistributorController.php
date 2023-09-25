<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExportCSVfordistributor;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ExportCSVfordistributorController extends Controller
{
    //
    function index() {
        return view('pages.dashboards.exportCSVfordistributor.index');
    }
}
