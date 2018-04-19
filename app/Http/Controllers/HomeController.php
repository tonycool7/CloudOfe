<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = [
            [
                'name' => 'name.txt',
                'modified' => '04/04/2018 16:00',
                'members' => '2 members'
            ]
        ];

        return view('home', compact('files'));
    }
}
