<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Media;
use App\MediaType;
use App\MediaRoute;
use App\MediaGallery;
use App\GalleryUser;
//use App\Gallery;

use Storage;
use Hash;
use DB;
use App\Helpers\FileHelper;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = User::where("email", env('ADMIN_MAIL'))->first();
        $users = User::all();
        if(is_null($user)){
            User::create([
                'name' => 'Fabio Hashimoto',
                'email' => env('ADMIN_MAIL'),
                'password' => Hash::make('fabio')
            ]);
        } 
        $mediaType = MediaType::where("media_type_short_name", 'im')->first();
        if(is_null($mediaType)){
            MediaType::create([
                'media_type_short_name' => 'im',
                'media_type_name' => 'images'
            ]);
        }
        $mediaRoute = MediaRoute::where("media_route_name", 'galleries')->first();
        if(is_null($mediaRoute)){
            MediaRoute::create([
                'media_route_name' => 'galleries',
                'media_route_has_galleries' => 1,
                'media_route_description' => 'Galeria de Imagens'
            ]);
        }
        return 'ABOUT';
        $directories = Storage::disk('public')->directories('fabio');
        try {
            DB::beginTransaction();
            User::create([
                'name' => 'Daniel Hashimoto',
                'email' => 'linkhashimoto@hotmail.com',
                'password' => Hash::make('daniel')
            ]);
            DB::commit();
            return 1;
            $user = User::where("email", env('ADMIN_MAIL'))->first();
            $user_id = $user->id;
            MediaType::create([
                'media_type_short_name' => 'im',
                'media_type_name' => 'images'
            ]);
            GalleryUser::create([
                'gallery_user_name' => 'Sensual',
                'gallery_user_description' => 'Sensualizando',
                'gallery_user_pos' => 0,
                'user_id' => $user_id,
                'banner_media_id' => null
            ]);
            GalleryUser::create([
                'gallery_user_name' => 'Noturno',
                'gallery_user_description' => 'Noturno Fotos',
                'gallery_user_pos' => 0,
                'user_id' => $user_id,
                'banner_media_id' => null
            ]);
            MediaRoute::create([
                'media_route_name' => 'galleries',
                'media_route_has_galleries' => 1,
                'media_route_description' => 'Galeria de Imagens'
            ]);

            foreach($directories as $directory){
                $directoryArr = explode("/", $directory);
                $lastDirectoryName = $directoryArr[count($directoryArr) - 1];
                $files = Storage::disk('public')->files($directory);

                /*$gallery = Gallery::where('gallery_name', $lastDirectoryName)->first();
                if(is_null($gallery)){
                    $gallery = Gallery::create([
                        'gallery_name' => $lastDirectoryName
                    ]);
                }*/
                //vincula galeria ao usuário
                /*$galleryUser = GalleryUser::where('gallery_id', $gallery->gallery_id)->where('user_id', $user_id)->first();
                if(is_null($galleryUser)){
                    $galleryUser = GalleryUser::create([
                        'banner_media_id' => null,
                        'gallery_user_pos' => GalleryUser::where('user_id', $user_id)->max('gallery_user_pos') + 1,
                        'gallery_id' => $gallery->gallery_id,
                        'user_id' => $user_id,
                    ]);
                }*/
                if(count($files) > 0){
                    $galleryUser = GalleryUser::first();
                    foreach($files as $file){
                        $random_name    = uniqid($user_id).bin2hex(random_bytes(16));  //for generate a random name based on ID
                        $path_basic     = FileHelper::getUserImagePath($user_id, "images/users");
                        $path = public_path($file);
                        $ext = pathinfo($path, PATHINFO_EXTENSION);
                        $currentFileName = pathinfo($path, PATHINFO_FILENAME);
                        $copyThis = "{$directory}/{$currentFileName}.{$ext}";
                        $copyTo =  "{$path_basic}/{$random_name}.{$ext}";

                        $mediaCreate = Media::create([
                            'media_title' => 'Titulo',
                            'media_comment' => 'Comentário',
                            'media_url' => "{$random_name}.{$ext}",
                            'media_nsfw' => 0,
                            'media_type_id' => MediaType::first()->media_type_id,
                            'user_id' => $user_id
                        ]);

                        //$newGallery = Gallery::where('gallery_id', $lastDirectoryName)->find();
                        $last_media_gallery_pos = GalleryUser::from('galleries_users as gaus')
                        ->join('medias_galleries as mega', 'mega.gallery_user_id', 'gaus.gallery_user_id')
                        ->where('gaus.user_id', $user_id)
                        ->where('gaus.gallery_user_id', $galleryUser->gallery_user_id)
                        ->max('mega.media_gallery_pos');

                        $mediaGalleryCreate = MediaGallery::create([
                            'media_id' => $mediaCreate->media_id,
                            //'gallery_id' => $gallery->gallery_id,
                            'media_route_id' => MediaRoute::first()->media_route_id,
                            'gallery_user_id' => $galleryUser->gallery_user_id,
                            'media_gallery_pos' => $last_media_gallery_pos + 1
                        ]);
                        /*GalleryUser::where('gallery_user_id', $galleryUser->gallery_user_id)->update([
                            'banner_media_id' => $mediaGalleryCreate->media_gallery
                        ]);*/
                        $storageCopy = Storage::disk('public')->copy($copyThis, $copyTo);
                    }
                }
            }

            DB::commit();
        } catch(\Exception $e){
            dd($e);
            DB::rollback();
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function show($id)
    {
        //
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
