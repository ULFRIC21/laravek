<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function special()
    {
        return view('special');
    }

    public function reviews()
    {
        return view('reviews');
    }

    public function contacts()
    {
        return view('contacts');
    }

    public function news()
    {
        return view('news');
    }

    public function calc()
    {
        return view('cals');
    }
}
