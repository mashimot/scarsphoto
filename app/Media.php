<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Auth;
use App\Helpers\FileHelper;
use App\MediaRoute;
use App\GalleryUser;
use DB;
use Carbon\Carbon;

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
        /*->leftJoin('medias_galleries as mega', 'meds.media_id', 'mega.media_id')
        ->leftJoin('galleries_users as gaus', 'gaus.gallery_user_id', 'mega.gallery_user_id');*/
        ->leftJoin('galleries_users as gaus', 'gaus.user_id', 'user.id')
        ->leftJoin('medias_galleries as mega', 'meds.media_id', 'mega.media_id');
        
        if($request->filled('media_id')){
            $medias = $medias->where('meds.media_id', $request->media_id);
        }
        if($request->filled('gallery_id')){ //if the request param. gallery_id exists and has value
            if($request->gallery_id == '0'){ //photos without galleries
                $medias = $medias->whereNull('mega.gallery_user_id');
            } else if($request->gallery_id == 'all'){ //all photos with galleries
                $medias = $medias->whereNotNull('mega.gallery_user_id');
            } else if($request->gallery_id == 'bg_covers'){ //all photos with galleries
                $medias = $medias->whereRaw('meds.media_id = gaus.banner_media_id');
            } else {
                $mediaRoute = MediaRoute::where('media_route_name', 'galleries')->select('media_route_id')->first();
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

        $medias = $medias->where(function($query) use ($request){ //users with galleries
            $query->where('gaus.user_id', $request->user_id)
            ->orWhere('meds.user_id', $request->user_id);
        })
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
            'user.name as media_owner_name'
        ])
        ->orderBy('meds.created_at', 'DESC')
        ->paginate(24);

        $newMedias = [];
        if(count($medias) > 0){
            /*$previous_media_id = -1;
            foreach($medias->getCollection() as $media){            
                $newMedia = new \stdClass;
                $path = FileHelper::getUserImagePath($media->user_id, 'images/users');
                $file = "{$path}/{$media->media_url}";
                $media_url = FileHelper::getUrlFile($file);

                if($previous_media_id != $media->media_id){
                    $newMedia->media_id = $media->media_id;
                    $newMedia->media_title = $media->media_title;
                    $newMedia->media_comment = $media->media_comment;
                    $newMedia->media_url = $media_url;
                    $newMedia->media_thumb_url = $media->media_url;
                    $newMedia->media_nsfw = $media->media_nsfw;
                    $newMedia->user_id = $media->user_id;
                    $newMedia->media_owner_name = $media->media_owner_name;
                    $newMedia->created_at = $media->created_at;                    
                    $newMedia->is_media_owner = $media->user_id == $request->user_id? true: false;
                    $newMedia->media_galleries = MediaGallery::from('medias_galleries as mega')
                    ->join('galleries_users as gaus', 'gaus.gallery_user_id', 'mega.gallery_user_id')
                    ->where('mega.media_id', $media->media_id)
                    ->where('gaus.user_id', $request->user_id)
                    ->select([
                        'gaus.gallery_user_id as gallery_id',
                        'gaus.gallery_user_name as gallery_name',
                    ])->get();

                    $newMedia->banner_galleries = GalleryUser::where('user_id', $request->user_id)
                    ->where('banner_media_id', $media->media_id)
                    ->whereNotNull('banner_media_id')
                    ->select([
                        'gallery_user_id as gallery_id',
                        'gallery_user_name as gallery_name'
                    ])->get();

                    $newMedias[] = $newMedia;
                }
                
                $previous_media_id = $media->media_id;
            }
            //$medias->setCollection(collect($newMedias));
            */
            $newMedias = $medias->getCollection()->map(function($media) use ($request){
                $path = FileHelper::getUserImagePath($media->user_id, 'images/users');
                $full_url = FileHelper::getUrlFile("{$path}/{$media->media_url}");

                $media->media_url = $full_url;
                $media->media_thumb_url = $full_url;
                $media->user_id = $media->user_id;
                $media->media_owner_name = $media->media_owner_name;
                $media->is_media_owner = $media->user_id == $request->user_id? true: false;
                $media->media_galleries = MediaGallery::from('medias_galleries as mega')
                ->join('galleries_users as gaus', 'gaus.gallery_user_id', 'mega.gallery_user_id')
                ->where('mega.media_id', $media->media_id)
                ->where('gaus.user_id', $request->user_id)
                ->select([
                    'gaus.gallery_user_id as gallery_id',
                    'gaus.gallery_user_name as gallery_name',
                ])->get();
                
                //background images of galleries
                $media->banner_galleries = GalleryUser::where('user_id', $request->user_id)
                ->where('banner_media_id', $media->media_id)
                ->whereNotNull('banner_media_id')
                ->select([
                    'gallery_user_id as gallery_id',
                    'gallery_user_name as gallery_name',
                    'banner_media_id',
                ])->get();

                //background images of pages
                $media->background_pages = [];
                $fileContent = FileHelper::getFileContent("images/pages/{$request->user_id}/page-background.json");
                if(!is_null($fileContent)){
                    $fileContent = json_decode($fileContent);
                    foreach($fileContent as $key => $content){
                        $content = (object)$content;
                        //$fileContent[$key]->is_checked = false;
                        if($media->media_id == $content->media_id){
                            $contentMedia = Media::find($content->media_id);
                            //$fileContent[$key]->media_url = FileHelper::getUrlFile("{$path}/{$contentMedia->media_url}");
                            //$fileContent[$key]->is_checked = true;
                            $media->background_pages[] = $fileContent[$key];
                        }
                    }
                    //$media->background_pages = $fileContent;
                    /*$media->joeys = collect($fileContent)->mapToGroups(function ($item, $key) {
                        return [$item->media_id => $item->page];
                    });*/
                }


                return $media;
            });
        }
     
        $medias->setCollection(collect($newMedias));

        return $medias;
    }
}
