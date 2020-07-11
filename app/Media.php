<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Auth;
use App\Helpers\FileHelper;
use App\MediaRoute;
use DB;

class Media extends Model
{
    //
    protected $table = 'medias';
    protected $primaryKey = 'media_id';
    protected $uniqueKeys = ['user_id', 'media_type_id'];
    protected $fillable = [
        'media_title',
        'media_comment',
        'media_url',
        'media_nsfw',
        'media_type_id',
        'user_id'
    ];
    
    public static function getMediasGalleries(Request $request){
        //$user_id = $request->user_id;
        $medias = DB::table('medias')->from('medias as meds')
        ->leftJoin('users as user', 'user.id', 'meds.user_id')
        ->leftJoin('medias_galleries as mega', 'meds.media_id', 'mega.media_id')
        ->leftJoin('galleries_users as gaus', 'gaus.gallery_user_id', 'mega.gallery_user_id')
        ->where(function($query) use ($request){
            $query->where('gaus.user_id', $request->user_id)
            ->orWhere('meds.user_id', $request->user_id);
        }); //usuários com galeria
        
        if($request->filled('gallery_id')){
            if($request->gallery_id == '0'){
                $medias = $medias->whereNull('gaus.gallery_user_id');
            } else {
                $mediaRoute = MediaRoute::where('media_route_name', 'galleries')->first();
                $medias = $medias->whereExists(function($query) use ($request){
                    $query->select(DB::raw(1))
                        ->from('medias_galleries as mga')
                        ->join('galleries_users as uga', 'uga.gallery_user_id', 'mga.gallery_user_id')
                        ->whereRaw('mga.media_id = mega.media_id')
                        ->whereRaw('uga.user_id = gaus.user_id')
                        ->where('uga.gallery_user_id', $request->gallery_id);
                })
                ->where('mega.media_route_id', $mediaRoute->media_route_id);
            }
        }

        $medias = $medias
        //->whereIn('meds.media_id', [56, 48])
        ->distinct([
            'meds.media_id',
            'meds.media_title',
            'meds.media_comment',
            'meds.media_nsfw',
            'meds.media_url',
            'meds.created_at',
            'user.id',
            'user.name'
        ])
        ->select([
            'meds.media_id',
            'meds.media_title',
            'meds.media_comment',
            'meds.media_nsfw',
            'meds.media_url',
            'meds.created_at',
            'user.id as user_id',
            'user.name as owner_media_name'
        ])
        ->orderBy('meds.created_at', 'ASC')
        ->paginate(2);

        $newMedias = [];
        if(count($medias) > 0){
            $previous_media_id = -1;
            //$user_id = Auth::user()->id ?? 1;
            foreach($medias->getCollection() as $media){
                $newMedia = new \stdClass;
                $path = FileHelper::getUserImagePath($media->user_id, 'images/users');
                $media_url = asset("storage/{$path}/{$media->media_url}");

                if($previous_media_id != $media->media_id){
                    $newMedia->media_id = $media->media_id;
                    $newMedia->media_title = $media->media_title;
                    $newMedia->media_comment = $media->media_comment;
                    $newMedia->media_url = $media_url;
                    $newMedia->media_thumb_url = $media->media_url;
                    $newMedia->media_nsfw = $media->media_nsfw;
                    $newMedia->user_id = $media->user_id;
                    $newMedia->owner_media_name = $media->owner_media_name;
                    $newMedia->created_at = $media->created_at;
                    $newMedia->is_owner_media = $media->user_id == $request->user_id? true: false;
                    $newMedia->media_galleries = MediaGallery::from('medias_galleries as mega')
                    ->join('galleries_users as gaus', 'gaus.gallery_user_id', 'mega.gallery_user_id')
                    ->where('mega.media_id', $media->media_id)
                    ->where('gaus.user_id', $request->user_id)
                    ->select([
                        'gaus.gallery_user_id as gallery_id',
                        'gaus.gallery_user_name as gallery_name',
                    ])
                    ->get();
                    $newMedias[] = $newMedia;
                }
                
                $previous_media_id = $media->media_id;
            }
        }
     
        $medias->setCollection(collect($newMedias));

        return $medias;
    }
}
