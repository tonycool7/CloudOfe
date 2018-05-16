<?php

namespace App\Http\Controllers\CloudOfe;

use App\folder_in_folder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\folder;

class FolderController extends Controller
{
    private $cloud_path = '/cloudofe/data/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $folderData = $request->all();
        $folder = folder::findOrFail($request->folder_id);
        $folders = $folder->folders ?? [];

        $folderData['name'] = $request->name;
        $folderData['type'] = "folder";
        $folderData['user_id'] = \Auth::id();


        if(!file_exists($this->cloud_path.\Auth::user()->email.'/'.$folderData['name'])) {
            if (mkdir($this->cloud_path . \Auth::user()->email . '/' . $folderData['name'])) {
                $newFolderId = folder::create($folderData);
            } else {
                return response()->json([
                    'file' => [
                        'data' =>  $this->retrieveFoldersChildren($folders),
                        'msg' => 'Folder failed to create',
                        'type' => 'fail'
                    ]
                ]);
            }
        }else{
            return response()->json([
                'folders' => [
                    'data' => $this->retrieveFoldersChildren($folders),
                    'msg' => 'Folder Exists',
                    'type' => 'fail'
                ]
            ]);
        }

        folder_in_folder::create([
            'parent_folder_id' => $request->folder_id,
            'child_folder_id' => $newFolderId->id
        ]);

        $folders = $folder->folders ?? [];

        return response()->json([
            'folders' => [
                'data' => $this->retrieveFoldersChildren($folders),
                'msg' => 'Folder created',
                'type' => 'success'
            ],
            'root_folder_id' => $request->folder_id
        ]);
    }

    public static function retrieveFoldersChildren($folder){
        $folderList = [];

        foreach ($folder as $item){
            array_push($folderList, folder::find($item->child_folder_id)->toArray());
        }

        return $folderList;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $folder = folder::findOrFail($id);
        $folders = $folder->folders ?? [];
        $files = $folder->files ?? [];

        return response()->json([
            'files' => [
                'data' => $files,
                'msg' => 'Files fetched',
                'type' => 'success'
            ],
            'folders' => [
                'data' => $this->retrieveFoldersChildren($folders),
                'msg' => 'File fetched',
                'type' => 'success'
            ],
            'root_folder_id' => $id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $folder = folder::findOrFail($id);
        $folder->folders()->delete();
        $folder->files()->delete();

        if(file_exists($this->cloud_path.\Auth::user()->email.'/'.$folder->name)){
            exec('rm -rf '.$this->cloud_path.\Auth::user()->email.'/'.$folder->name);
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

        folder::destroy($id);
        return $responseJson;
    }
}
