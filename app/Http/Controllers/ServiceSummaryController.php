<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceSummary;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ServiceSummaryController extends Controller
{
    //
    public function index() {
        return view('pages.dashboards.servicesummary.index');
    }
}
