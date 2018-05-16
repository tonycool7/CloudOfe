<?php

namespace App\Http\Controllers;

use App\files;
use App\folder;
use App\Http\Controllers\CloudOfe\FolderController;
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
        $root_folder_id = folder::where('name', '=', \Auth::user()->email)->get()[0]->id;

        $folder = folder::findOrFail($root_folder_id);
        $folders = FolderController::retrieveFoldersChildren($folder->folders) ?? [];
        $files = $folder->files ?? [];

        return view('home', compact('files', 'folders', 'root_folder_id'));
    }
}
