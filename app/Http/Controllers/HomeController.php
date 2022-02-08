<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function index()
    {
        $category = DB::table('categories')
        ->get();

        $proNew = DB::table('products')
        ->select('*')
        ->limit(8)
        ->orderByDesc('id')
        ->get();

        $proHot = DB::table('products')
        ->select('*')
        ->where('pro_hot', 1)
        ->limit(8)
        ->orderByDesc('id')
        ->get();

        $slides = DB::table('slides')->orderBy('sd_sort')->get();

        // dd($slides[0]);
        return view('pages.home.index', compact('category', 'proNew', 'proHot', 'slides'));
    }
}
