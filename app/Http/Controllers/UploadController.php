<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\UploadRepositoryInterface;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    protected $UploadReposity;


    public function __construct(UploadRepositoryInterface $UploadReposity)
    {
        $this->UploadReposity = $UploadReposity;
    }


    public function imageUpload(Request $request)
    {
        $path =  $this->UploadReposity->imageUpload($request);
        return env('UPLOAD_IMG').'/'.$path;
    }
}
