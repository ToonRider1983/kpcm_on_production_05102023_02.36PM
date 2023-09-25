<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UntouchedMachines;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class UntouchedMachinesController extends Controller
{
    //
    public function index() {
        return view('pages.dashboards.untouchedmachines.index');
    }
}
