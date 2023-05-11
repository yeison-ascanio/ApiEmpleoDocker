<?php

namespace App\Http\Controllers;

use App\Http\Helper\Helper;
use App\Http\Requests\File\SaveFileRequest;
use App\Http\Requests\File\UpdateFileRequest;
use App\Models\File;
use App\Models\UserFile;
use Illuminate\Http\Request;

class FileController extends Controller
{
    private $file;
    private $user_file;
    private $helper; 
    private $error;
    private $sucess;

    public function __construct()
    {
        $this->file      = new File();
        $this->user_file = new UserFile();
        $this->helper    = new Helper();
        $this->error     = 400;
        $this->sucess    = 200;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function saveFile(SaveFileRequest $request)
    {
        $state_save = $this->file->saveFile($request->toArray());

        if ($state_save) {
            return $this->helper->response((bool)$state_save, $this->sucess);
            $this->user_file->saveUserFile($request->toArray(), $state_save);
        }

        return $this->helper->response((bool)$state_save, $this->error);
    }

    /**
     * Display the specified resource.
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateFile(UpdateFileRequest $request)
    {
        $exits_file = $this->file->getFile($request->data['id_file']);

        if($exits_file) $this->helper->response(!(bool)$exits_file, $this->error, null, "This File doesn't exist.");

        $update = (bool)$this->file->updateFile($request->toArray(), $exits_file['id']);

        if($update) return $this->helper->response($update, $this->sucess, null, "File updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        //
    }
}
