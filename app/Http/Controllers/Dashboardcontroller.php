<?php

namespace App\Http\Controllers;

use App\Models\Agriculteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Dashboardcontroller extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole('user')){
            return view('userdash');
        }elseif(Auth::user()->hasRole('editor')){
            return view('editordash');
        }elseif(Auth::user()->hasRole('admin')){
            return view('dashboard');
        }
    }

    public function agriculteur()
    {
        return view('agriculteursdash');
    }
}
