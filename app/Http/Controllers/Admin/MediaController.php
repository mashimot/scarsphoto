<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Media;
use App\MediaGallery;
use App\MediaRoute;
use App\MediaType;
use App\GalleryUser;
use DB;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Support\Facades\File;
use Auth;
use App\Http\Requests\Admin\MediaRequest;
use App\Helpers\FileHelper;

class MediaController extends Controller
{

    public function __construct(Media $media, MediaGallery $mediaGallery){
        $this->media = $media;
        $this->mediaGallery = $mediaGallery;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //
       return view('admin.galleries.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $request->merge([
            'user_id' => Auth::user()->id
        ]);
        return $this->media->getMediasGalleries($request);
    }

    /**
     * Upload new file and store it
     * @param  Request $request Request with form data: filename and file info
     * @return boolean True if success, otherwise - false
     */
    public function store(MediaRequest $request)
    {
        //return $request->medias;

        $user_id        = Auth::user()->id;
        $path_basic     = FileHelper::getUserImagePath($user_id, "images/users");
        $mediaType      = MediaType::where('media_type_short_name', 'im')->first();
        try {
            DB::beginTransaction();
            foreach($request->medias as $media){
                $file           = $media['media_file'];
                $name           = $file->getClientOriginalName();
                $ext            = $file->getClientOriginalExtension();
                $random_name    = uniqid($user_id).md5(time());  //for generate a random name based on ID
                $file_name      = "{$random_name}.{$ext}";
                $mediaCreate = $this->media->create([
                    'media_title' => $media['media_title'],
                    'media_comment' => $media['media_comment'],
                    'media_url' => $file_name,
                    'media_nsfw' => $media['media_nsfw'],
                    'media_type_id' => $mediaType->media_type_id,
                    'user_id' => $user_id                
                ]);

                if(!is_null($media['media_galleries'])){
                    $mediaRoute = MediaRoute::where('media_route_name', 'galleries')->first();
                    $galleryUserMax = GalleryUser::where('user_id', $user_id)->max('gallery_user_pos');
                    foreach($media['media_galleries'] as $media_gallery){
                        $last_media_gallery_pos = $this->mediaGallery->from('medias_galleries as mega')
                        ->join('galleries_users as gaus', 'gaus.gallery_user_id', 'mega.gallery_user_id')
                        ->where('gaus.user_id', $user_id)
                        ->where('gaus.gallery_user_id', $media_gallery['gallery_id'])
                        ->max('mega.media_gallery_pos');
                        $galleryUser = GalleryUser::where('user_id', $user_id)
                        ->where('gallery_user_id', $media_gallery['gallery_id'])
                        ->first();
    
                        $this->mediaGallery->create([
                            'media_id' => $mediaCreate->media_id,
                            'gallery_user_id' => $galleryUser->gallery_user_id,
                            'media_gallery_pos' => is_null($last_media_gallery_pos)? 0 : $last_media_gallery_pos + 1,
                            'media_route_id' => $mediaRoute->media_route_id
                        ]);
                    }
                }
    
                $width = 300; // your max width
                $height = 300; // your max height
                $imgFull = Image::make($file);
                $imgThumb = Image::make($file);
                $imgThumb->height() > $imgThumb->width() ? $width = null : $height = null;
                $imgThumb->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                });            
                $storeImg = Storage::disk('public')
                    ->put("{$path_basic}/{$file_name}", $imgFull->encode());
            }
            /*$storeImgThumb = Storage::disk('public')
                ->put("{$path_basic}/{$file_name}", $imgThumb->encode());*/

            //if($storeImg && $storeImgThumb){
            DB::commit();
        } catch(\Exception $e){  
            DB::rollback();
            return response()->json($e, 422);
        }

        return [];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return $this->media->find($id);
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
        $this->media->find($id)->update([
            'media_title' => $request->media_title,
            'media_comment' => $request->media_comment,
            'media_url' => $request->media_url,
            'media_nsfw' => $request->media_nsfw,
            'media_type_id' => 1
        ]);
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
        DB::beginTransaction();
        try {
            $user_id    = Auth::user()->id;
            $media      = $this->media->find($id);

            if($media->user_id == $user_id){
                $path_basic = FileHelper::getUserImagePath($user_id, "images/users");
                $media_url  = "{$path_basic}/{$media->media_url}";
                $mediaGallery = $this->mediaGallery->from('medias_galleries as mega')
                ->join('medias as medi', 'medi.media_id', 'mega.media_id')
                ->join('galleries_users as gaus', 'gaus.banner_media_id', 'medi.media_id')
                ->where('medi.media_id', $id)
                ->where('gaus.user_id', $user_id)
                ->select([
                    'gaus.gallery_user_id',
                    'gaus.banner_media_id'
                ])
                ->first();
    
                if(!is_null($mediaGallery)){
                    GalleryUser::where('banner_media_id', $mediaGallery->banner_media_id)
                    ->update([
                        'banner_media_id' => null
                    ]);
                }
                
                $mediaGallery = $this->mediaGallery->where('media_id', $id)->delete();
                $m = $this->media->find($id)->delete();
                
                if($m){
                    Storage::disk('public')->delete($media_url);
                    DB::commit();
                } else {
                    DB::rollback();    
                }
            } else {
                return response()->json([
                    'You must be the owner of the picture'
                ], 402);
            }
        } catch (\Exception $e){
            DB::rollback();
            return json_encode($e);
        }
    }
}
