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
        $user_id = Auth::user()->id;
        $mediaRoute = MediaRoute::where('media_route_name', 'galleries')->first();
        $media = Media::find($id);

        if($media->user_id == $user_id){ //only owner of the media are able to update
            $mediaUpdate = Media::find($id)->update([
                'media_title' => $request->media_title,
                'media_comment' => $request->media_comment,
                'media_nsfw' => $request->media_nsfw
            ]);
        }

        foreach($request->media_galleries as $m){
            $galleryUser = GalleryUser::where('user_id', $user_id)
            ->where('gallery_user_id', $m['gallery_id'])
            ->first();
            
            $mediaGallery = $this->mediaGallery->where('gallery_user_id', $galleryUser->gallery_user_id)
            ->where('media_id', $id)
            ->first();

            if(is_null($mediaGallery)){
                if($m['is_checked']){
                    $last_media_gallery_pos = $this->mediaGallery->from('medias_galleries as mega')
                    ->join('galleries_users as gaus', 'gaus.gallery_user_id', 'mega.gallery_user_id')
                    ->where('gaus.user_id', $user_id)
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
}
