<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\MediaGallery;
use App\MediaRoute;
use App\Gallery;
use App\GalleryUser;
use App\Media;
use App\User;
use DB;
use Route;
use Storage;
use File;
use Auth;
use App\Helpers\FileHelper;
use Illuminate\Filesystem\Filesystem;
class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Galerias do usuário
        $user = User::where('email', 'like', '%scarsphoto.com.br%')->first();
        $user_id = $user->id;
        $userGalleries = GalleryUser::from('galleries_users as gaus')
        ->join('medias_galleries as mega', 'mega.gallery_user_id', 'gaus.gallery_user_id')
        ->leftJoin('medias as medi', 'medi.media_id', 'gaus.banner_media_id')
        ->where('gaus.user_id', $user_id)
        ->select([
            'gaus.gallery_user_id as gallery_id',
            'gaus.user_id',
            'medi.media_url',
            'gaus.gallery_user_name as gallery_name'            
        ])
        ->selectRaw('count(*) as total')
        ->groupBy([
            'gaus.gallery_user_id',
            'gaus.user_id',
            'medi.media_url',
            'gaus.gallery_user_name'
        ])
        ->get();

        $photos = GalleryUser::from('galleries_users as gaus')
        ->distinct('mega.media_id')
        ->join('medias_galleries as mega', 'mega.gallery_user_id', 'gaus.gallery_user_id')
        ->where('gaus.user_id', $user_id)
        ->select('mega.media_id');

        $userGalleries->map(function($galleryUser) use ($user_id){
            $media_url = null;
            $path = FileHelper::getUserImagePath($user_id, 'images/users');
            $media_url = asset("storage/{$path}/{$galleryUser->media_url}");
            
            $galleryUser->media_url = $media_url;
            
            return $galleryUser;
        });

        $newGalleryUser = new GalleryUser;
        $newGalleryUser->gallery_id = 'all';
        $newGalleryUser->user_id = $user_id;
        $newGalleryUser->media_url = null;
        $newGalleryUser->gallery_name = "Photos";
        //$newGalleryUser->total = $userGalleries->sum('total');        
        $newGalleryUser->total = $photos->count();
        $userGalleries->push($newGalleryUser);

        return $userGalleries;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = User::where('email', 'like', '%scarsphoto.com.br%')->first();
        
        $userGalleries = GalleryUser::from('galleries_users as gaus')
        ->where('gaus.user_id', $user->id)
        ->whereExists(function($query){
            $query->select(DB::raw(1))
                ->from('medias_galleries as a')
                ->whereRaw('a.gallery_user_id = gaus.gallery_user_id');
        })
        ->select([
            'gaus.gallery_user_id', 
            DB::raw('count(*) as total')
        ])
        ->groupBy([
            'gaus.gallery_user_id'
        ])
        ->get();

        $medias = Media::from('medias as medi')
        ->join('medias_galleries as mega', 'mega.media_id', 'medi.media_id')
        ->where('medi.user_id', $user->id)
        ->select([
            'mega.media_id'
        ])
        ->groupBy([
            'mega.media_id'
        ])
        ->get();

        return response()->json(
            compact('userGalleries', 'medias')
        );
    }


    public function getCoverImage(Request $request)
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
        $user = User::where('email', 'like', '%scarsphoto.com.br%')->first();
        $user_id = $user->id;
        $mediaRoute = MediaRoute::where('media_route_name', 'galleries')->first();
        $request->merge([
            'gallery_id' => $id,
            //'media_route_id' => $mediaRoute->media_route_id,
            'user_id' => $user_id
        ]);
        $images = Media::getMediasGalleries($request);
        $gallery = [];
        if($request->page == 1){
            $gallery = GalleryUser::from('galleries_users as gaus')
            ->where('gaus.user_id', $user_id)
            ->where('gaus.gallery_user_id', $id)
            ->select([
                'gaus.gallery_user_id as gallery_id',
                'gaus.gallery_user_name as gallery_name',
                'gaus.banner_media_id'
            ])
            ->first();
            if(!is_null($gallery)){
                $media_url = null;
                $mediaGallery = MediaGallery::from('medias_galleries as mega')
                ->join('medias as medi', 'medi.media_id', 'mega.media_id')
                ->where('medi.media_id', $gallery->banner_media_id)
                ->select([
                    'medi.media_url'
                ])
                ->first();
                if(!is_null($mediaGallery)){
                    $path = FileHelper::getUserImagePath($user_id, 'images/users');
                    $media_url = asset("storage/{$path}/{$mediaGallery->media_url}");
                }
                
                $gallery->media_url_gallery_cover = $media_url;
            }
        }

        return response()->json(
            compact('images', 'gallery')
        );
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
        //
    }
}
