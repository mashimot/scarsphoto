<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\MediaRequest;
use App\Helpers\FileHelper;
use App\GalleryUser;
use App\MediaGallery;
use App\MediaRoute;
use App\Media;
use Auth;
use DB;
use Storage;

class MediaGalleryController extends Controller
{

    public function __construct(MediaGallery $mediaGallery){
        $this->mediaGallery = $mediaGallery;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       //em uso
       $request->merge([
            'user_id' => Auth::user()->id
       ]);
       return Media::getMediasGalleries($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id, Request $request)
    {
        //em uso
        return MediaGallery::from('medias_galleries as mega')
        ->join('galleries_users as gaus', 'gaus.gallery_user_id', 'mega.gallery_user_id')
        ->where('mega.media_id', $id)
        ->select([
            'mega.media_id',
            'gaus.gallery_user_id as gallery_id',
        ])
        ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        //
        $request->merge([
            'user_id' => Auth::user()->id,
            'gallery_id', $id
        ]);
        return Media::getMediasGalleries($request);
        //        $request->merge(['gallery_id' => $id]);
//        return Media::getMediasGalleries($request);
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
    public function update(MediaRequest $request, $id)
    {
        //
        $user = Auth::user();
        $mediaRoute = MediaRoute::where('media_route_name', 'galleries')->first();
        $media = Media::find($id);

        if($media->user_id == $user->id){ //only owner of the media are able to update
            $mediaUpdate = Media::find($id)->update([
                'media_title' => $request->media_title,
                'media_comment' => $request->media_comment,
                'media_nsfw' => $request->media_nsfw
            ]);
        }

        foreach($request->media_galleries as $m){
            $galleryUser = GalleryUser::where('user_id', $user->id)
            ->where('gallery_user_id', $m['gallery_id'])
            ->first();
            
            $mediaGallery = $this->mediaGallery->where('gallery_user_id', $galleryUser->gallery_user_id)
            ->where('media_id', $id)
            ->first();

            if(is_null($mediaGallery)){
                if($m['is_checked']){
                    $last_media_gallery_pos = $this->mediaGallery->from('medias_galleries as mega')
                    ->join('galleries_users as gaus', 'gaus.gallery_user_id', 'mega.gallery_user_id')
                    ->where('gaus.user_id', $user->id)
                    ->where('gaus.gallery_user_id', $galleryUser->gallery_user_id)
                    ->max('mega.media_gallery_pos');
                    
                    $this->mediaGallery->create([
                        'media_id' => $id,
                        'gallery_user_id' => $galleryUser->gallery_user_id,
                        'media_gallery_pos' => is_null($last_media_gallery_pos)? 0 : $last_media_gallery_pos + 1,
                        'media_route_id' => $mediaRoute->media_route_id
                    ]);
                }                            
            } else {
                if(!$m['is_checked']){
                    $this->mediaGallery->where('media_id', $id)
                    ->where('gallery_user_id', $galleryUser->gallery_user_id)
                    ->delete();
                }
            }
        }

//        $user = Auth::user();
        $file_name = 'page-background.json';
        $path = "images/pages/{$user->id}";        
        $file = "{$path}/{$file_name}";
        $dataJson = FileHelper::createPageBackgroundImage($file);

        $dataJson = json_decode($dataJson);
        foreach($dataJson as $k => $data){
            foreach($request->background_pages as $bg_page){
                $bg_page = (object) $bg_page;
                if($data->page == $bg_page->page){
                    if($bg_page->is_checked){
                        $dataJson[$k]->media_id = $id;
                    } else {
                        if($data->media_id == $id && !is_null($data->media_id)){
                            $dataJson[$k]->media_id = null;
                        }
                    }
                }
            }
        }
        Storage::disk('public')
        ->put($file, json_encode($dataJson));            

        foreach($request->banner_galleries as $galleryCover){
            $galleryCover = (object) $galleryCover;
            $galleryUser = GalleryUser::where('gallery_user_id', $galleryCover->gallery_id);
            if(!is_null($galleryUser->first())){
                if($galleryCover->is_checked){
                    $galleryUser->update([
                        'banner_media_id' => $id
                    ]);
                } else {
                    $galleryUser->where('banner_media_id', $id)
                    ->update([
                        'banner_media_id' => null
                    ]);
                }
            }
        }




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return $id;
    }

    private function updateBackgroundCover(){
        
    }
}
