<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class DashboarController extends Controller
{
    public function index(){
        return view('dashboard.mydashboard');
    }
    public function media(){
        return view('dashboard.media.index');
    }
}
