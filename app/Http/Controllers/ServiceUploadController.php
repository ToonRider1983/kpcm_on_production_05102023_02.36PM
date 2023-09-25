<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceUpload;

class ServiceUploadController extends Controller
{
    public function index() {
        return view('pages.dashboards.service_upload');
    }
}