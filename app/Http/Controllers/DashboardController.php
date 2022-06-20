<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function profile()
    {
        $genres = Genre::orderBy('name')->get(); 
        return view('dashboard.profile', ["genres" => $genres]);
    }
}
