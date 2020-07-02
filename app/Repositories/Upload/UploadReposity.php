<?php

namespace App\Repositories\Upload;

use App\Repositories\Interfaces\UploadRepositoryInterface;


class UploadReposity implements UploadRepositoryInterface
{
    public function imageUpload($request)
    {
        //暂缺对图片的判断
        $path = $request->file('wangEditorH5File')
                        ->storePublicly(md5(time()));

        return $path;
    }
}