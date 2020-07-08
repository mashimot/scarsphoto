<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Helpers\FileHelper;
use DB;
use Illuminate\Http\Request;

class MediaRoute extends Model
{
    //
    protected $table = 'medias_routes';
    protected $primaryKey = 'media_route_id';
    protected $fillable = [
        'media_route_name',
        'media_route_has_galleries',
        'media_route_description'
    ];
    public static function getMediasGalleriesByRoute(Request $request){
        $medias = DB::table('medias')->from('medias as meds')
        ->leftJoin('medias_galleries as mega', 'meds.media_id', 'mega.media_id')
        ->leftJoin('galleries_users as gaus', 'gaus.gallery_user_id', 'mega.gallery_user_id')
        ->leftJoin('galleries as gall', 'gall.gallery_id', 'gaus.gallery_id')
        ->where('meds.user_id', 1);
        
        if($request->filled('gallery_id')){
            if($request->gallery_id == '0'){
                $medias = $medias->whereNull('gall.gallery_id');
            } else {
                $medias = $medias->whereExists(function($query) use ($request){
                    $query->select(DB::raw(1))
                        ->from('medias_galleries as mga')
                        ->join('galleries_users as uga', 'uga.gallery_user_id', 'mga.gallery_user_id')
                        ->whereRaw('mga.media_id = mega.media_id')
                        ->whereRaw('uga.user_id = gaus.user_id')
                        ->where('uga.gallery_id', $request->gallery_id);
                })
                ->where('mega.media_route_id',1);
            }
        }

        /*if($request->filled('media_route_id')){
            $medias = $medias->where('media_route_id', $request->media_route_id);
        } else {
            $medias = $medias->where('media_route_id', 1);
        }*/

        $medias = $medias->select([
            'meds.media_id',
            'meds.media_title',
            'meds.media_comment',
            'meds.media_url',
            'meds.created_at',
            'gall.gallery_id',
        ])
        ->orderBy('meds.media_id', 'DESC')
        ->paginate(8);
        
        $newMedias = [];
        if(count($medias) > 0){
            $previous_media_id = -1;
            $user_id = Auth::user()->id ?? 1;
            foreach($medias->getCollection() as $media){
                $newMedia = new \stdClass;
                $path = FileHelper::getUserImagePath($user_id, 'images/users');
                $media_url = asset("storage/{$path}/{$media->media_url}");
                if (strpos($media->media_url, 'placeholder') !== false) { //gambiarra
                    $media_url = $media->media_url;
                }
                if($previous_media_id != $media->media_id){
                    $newMedia->media_id = $media->media_id;
                    $newMedia->media_title = $media->media_title;
                    $newMedia->media_comment = $media->media_comment;
                    $newMedia->media_url = $media_url;
                    $newMedia->media_thumb_url = $media->media_url;
                    $newMedia->created_at = $media->created_at;
                    $newMedia->galleries = [];
                    $newMedias[] = $newMedia;
                }
                $index = count($newMedias) - 1;

                if(!is_null($media->gallery_id)){
                    $newMedias[$index]->galleries[] = [
                        'gallery_id' => $media->gallery_id
                    ];
                }
                
                $previous_media_id = $media->media_id;
            }
        }
     
        $medias->setCollection(collect($newMedias));
        //dd($medias);
        return $medias;
    }

    public static function getMediasGalleriesByRoute2(Request $request){
        $medias = DB::table('medias')->from('medias as meds')
        ->leftJoin('medias_galleries as mega', 'meds.media_id', 'mega.media_id');
        if($request->filled('gallery_id')){
            if($request->gallery_id == '0'){
                $medias = $medias->whereNotExists(function($query){
                    $query->select(DB::raw(1))
                    ->whereRaw('mega.media_id = meds.media_id');
                });
            } else {
                $medias = $medias->whereExists(function($query) use ($request){
                    $query->select(DB::raw(1))
                    ->from('medias_galleries as mc1')
                    ->whereRaw('mc1.media_id = meds.media_id')
                    ->where('mc1.gallery_id', $request->gallery_id);
                });
            }
        }
        if($request->filled('media_route_id')){
            $medias = $medias->where('media_route_id', $request->media_route_id);
        } else {
            $medias = $medias->where('media_route_id', 1);
        }

        $medias = $medias
        ->where('meds.user_id', $request->user_id)
        ->select([
            'meds.media_id',
            'meds.media_title',
            'meds.media_comment',
            'meds.media_url',
            'meds.created_at',
            'mega.gallery_id',
        ])
        ->orderBy('meds.media_id', 'DESC')
        ->paginate(8);

        $newMedias = [];
        if(count($medias) > 0){
            $previous_media_id = -1;
            $user_id = Auth::user()->id ?? 1;
            foreach($medias->getCollection() as $media){
                $newMedia = new \stdClass;
                $path = FileHelper::getUserImagePath($user_id, 'images/users');
                $media_url = asset("storage/{$path}/{$media->media_url}");
                if (strpos($media->media_url, 'placeholder') !== false) { //gambiarra
                    $media_url = $media->media_url;
                }
                if($previous_media_id != $media->media_id){
                    $newMedia->media_id = $media->media_id;
                    $newMedia->media_title = $media->media_title;
                    $newMedia->media_comment = $media->media_comment;
                    $newMedia->media_url = $media_url;
                    $newMedia->media_thumb_url = $media->media_url;
                    $newMedia->created_at = $media->created_at;
                    $newMedia->galleries = [];
                    $newMedias[] = $newMedia;
                }
                $index = count($newMedias) - 1;

                if(!is_null($media->gallery_id)){
                    $newMedias[$index]->galleries[] = [
                        'gallery_id' => $media->gallery_id
                    ];
                }
                
                $previous_media_id = $media->media_id;
            }
        }
     
        $medias->setCollection(collect($newMedias));

        return $medias;
    }


    public static function getMediasWithoutGalleriesByRoute(Request $request){
        $medias = DB::table('medias')->from('medias as meds')
        ->leftJoin('medias_no_galleries as mega', 'meds.media_id', 'mega.media_id');
        if($request->filled('media_route_id')){
            $medias = $medias->where('media_route_id', $request->media_route_id);
        } else {
            $medias = $medias->where('media_route_id', 1);
        }
        $medias = $medias
        ->where('meds.user_id', $request->user_id)
        ->select([
            'meds.media_id',
            'meds.media_title',
            'meds.media_comment',
            'meds.media_url'
        ])
        ->get();
        
        $newMedias = [];
        if(count($medias) > 0){
            $previous_media_id = -1;
            $user_id = Auth::user()->id ?? 1;
            foreach($medias as $media){
                $newMedia = new \stdClass;
                $path = FileHelper::getUserImagePath($user_id, 'images/users');
                $media_url = asset("storage/{$path}/{$media->media_url}");
                if (strpos($media->media_url, 'placeholder') !== false) { //gambiarra
                    $media_url = $media->media_url;
                }
                if($previous_media_id != $media->media_id){
                    $newMedia->media_id = $media->media_id;
                    $newMedia->title = $media->media_title;
                    $newMedia->media_comment = $media->media_comment;
                    $newMedia->image = $media_url;
                    $newMedia->media_thumb_url = $media->media_url;
                    $newMedias[] = $newMedia;
                }
                $index = count($newMedias) - 1;
                $previous_media_id = $media->media_id;
            }
        }

        return $newMedias;
    }    
}
