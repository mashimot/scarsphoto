<?php

namespace App\Http\ViewComposers;

use App\GalleryUser;
use App\Media;
use App\User;
use App\MediaGallery;
use DB;

class GalleryComposer
{
    public function compose($view)
    {
        $user = User::where("email", env('ADMIN_MAIL'))->first();
        
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

        $view->with(
            compact('userGalleries', 'medias')
        );
    }
}