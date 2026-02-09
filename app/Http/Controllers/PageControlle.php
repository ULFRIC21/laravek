<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller 
{
public function special()  { return view('pages.special'); }
public function reviews()  { return view('pages.reviews'); }
public function contacts() { return view('pages.contacts'); }
public function news()     { return view('pages.news'); }
public function calc()     { return view('pages.calc'); }
}


