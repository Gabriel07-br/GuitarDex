<?php

namespace App\Http\Controllers;

class Site_Controller extends Controller
{
    public function index()
    {
        $name = 'Gabriel';
        $guitars = ['Fender Stratocaster', 'Gibson Les Paul', 'Ibanez RG', 'PRS Custom 24'];
        return view('home', compact('name', 'guitars'));

    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
