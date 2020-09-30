<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        
        $favTokens= \DB::table('tokens')->where('favorite', true)->get();
        
        return view('dashboard', ['favTokens' => $favTokens]);

    }
}
