<?php

namespace App\Http\Controllers\Donator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardDonatorController extends Controller
{
    public function index() {
        return view('donator.dashboard');
    }
    
}
