<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Inertia\Inertia;
use App\Models\Movie;

class DashboardController extends Controller
{
    public function index()
    {
        $featuredMovie = Movie::whereIsFeatured(true)->get();
        $Movies  =Movie::all();

        return inertia('User/Dashboard/Index',[
            'featuredMovie' => $featuredMovie,
           'movies' => $Movies,
        ]);
        // return[
        //     'featuredMovie' => $featuredMovie,
        //    'movies' => $Movies,
        // ];

    }
}
