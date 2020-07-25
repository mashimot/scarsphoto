<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Media;
use App\User;
use App\Helpers\FileHelper;

class PageBackgroundImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getBackgroundImage()
    {
        //
        $user = User::where('email', env('ADMIN_MAIL'))->first();
        if(!is_null($user)){
            $fileContent = FileHelper::getFileContent("images/pages/{$user->id}/page-background.json");

            if(!is_null($fileContent)){
                $fileContent = json_decode($fileContent);
                foreach($fileContent as $key => $content){
                    $content = (object)$content;
                    $path = FileHelper::getUserImagePath($user->id, 'images/users');
                    $media = Media::find($content->media_id);
                    $fileContent[$key]->media_url = FileHelper::getUrlFile("{$path}/{$media->media_url}");
                }

                return collect($fileContent)->pluck('media_url', 'page');
            }
        }

        return null;
    }
}
