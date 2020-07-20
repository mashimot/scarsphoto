<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Http\Requests\Admin\GalleryRequest;
use App\MediaGallery;
use App\GalleryUser;
use DB;
use Auth;
class GalleryController extends Controller
{
    public function __construct(GalleryUser $galleryUser){
        $this->galleryUser = $galleryUser;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //
       return 1;
       //return view('admin.galleries.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = Auth::user();
        return $this->galleryUser->where('user_id', $user->id)->get([
            'gallery_user_id as gallery_id',
            'gallery_user_name as gallery_name',
            'banner_media_id'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        //
        $user = Auth::user();
        $this->galleryUser->create([
            'gallery_user_name' => $request->gallery_name,
            'gallery_user_description' => $request->gallery_user_description,
            'gallery_user_pos' => 0,
            'user_id' => $user->id,
            'banner_media_id' => null
        ]);
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
        return $this->galleryUser->find(
            $id, 
            [
                'gallery_user_name as gallery_name', 
                'gallery_user_id as gallery_id',
                'banner_media_id'
            ]
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
    public function update(GalleryRequest $request, $id)
    {
        //
        $request->validate([
            'gallery_name' => 'required|max:255',
        ]);

        $this->galleryUser->find($id)->update([
            'gallery_user_name' => $request->gallery_name
        ]);
    }

    public function updateBackgroundCover(Request $request, $media_id)
    {
        //
        foreach($request->galleries_covers as $galleryCover){
            $galleryCover = (object) $galleryCover;
            $galleryUser = GalleryUser::where('gallery_user_id', $galleryCover->gallery_id);
            if(!is_null($galleryUser->first())){
                if($galleryCover->is_checked){
                    $galleryUser->update([
                        'banner_media_id' => $media_id
                    ]);
                } else {
                    $galleryUser->where('banner_media_id', $media_id)
                    ->update([
                        'banner_media_id' => null
                    ]);
                }
            }
        }
        
        return response()->json([
            'success' => true
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
            MediaGallery::from('medias_galleries as mega')
            ->join('galleries_users as gaus', 'gaus.gallery_user_id', 'mega.gallery_user_id')
            ->where('gaus.gallery_user_id', $id)
            ->delete();
            GalleryUser::find($id)->delete();
            //Gallery::find($id)->delete();
            DB::commit();
        } catch(\Exception $e){
            DB::rollback();
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
