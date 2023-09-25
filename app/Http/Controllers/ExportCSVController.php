<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExportCSV;

class ExportCSVController extends Controller
{
    function index() {
        return view('pages.dashboards.export_csv');
    }
}
