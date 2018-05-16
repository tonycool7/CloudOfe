<?php

namespace App\Http\Controllers\CloudOfe;

use http\Exception;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\files;

class FilesController extends Controller
{
    private $cloud_path = '/cloudofe/data/';

    function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->middleware('isVerified');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $files = \Auth::user()->files;
//
//        return response()->json([
//            'files' => $files
//        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileData = $request->all();

        $fileData['name'] = $request->file('file')->getClientOriginalName();
        $fileData['folder_id'] = $request->folder_id;
        $fileData['type'] = $request->file('file')->getClientOriginalExtension();
        $fileData['size'] = $request->file('file')->getClientSize();
        $fileData['extension'] = $request->file('file')->getClientOriginalExtension();
        $fileData['user_id'] = \Auth::id();


        if(!file_exists($this->cloud_path.\Auth::user()->email.'/'.$fileData['name'])) {
            if (move_uploaded_file($request->file('file')->getRealPath(), $this->cloud_path . \Auth::user()->email . '/' . $fileData['name'])) {
                files::create($fileData);
            } else {
                return response()->json([
                    'file' => [
                        'data' => \Auth::user()->files,
                        'msg' => 'File failed to upload',
                        'type' => 'fail'
                    ]
                ]);
            }
        }else{
            return response()->json([
                'file' => [
                    'data' => \Auth::user()->files,
                    'msg' => 'File already exists',
                    'type' => 'fail'
                ]
            ]);
        }

        return response()->json([
            'file' => [
                'data' => \Auth::user()->files,
                'msg' => 'File Uploaded',
                'type' => 'success'
                ]
        ]);

    }

    public function storeFile(Request $request)
    {

    }


    public function storeFolder(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file = files::findOrFail($id);

        return response()->download($this->cloud_path.\Auth::user()->email.'/'.$file->name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $responseJson = [];
        $file = files::findOrFail($id);
        if(file_exists($this->cloud_path.\Auth::user()->email.'/'.$file->name)){
            exec('rm -rf '.$this->cloud_path.\Auth::user()->email.'/'.$file->name);
            $responseJson = response()->json([
                'result' => [
                    'type' => 'success',
                    'msg' => 'File deleted'
                ]
            ]);
        }else{
            $responseJson = response()->json([
                'result' => [
                    'type' => 'fail',
                    'msg' => 'File doesn \'t exist'
                    ]
            ]);
        }

        files::destroy($id);
        return $responseJson;
    }
}
