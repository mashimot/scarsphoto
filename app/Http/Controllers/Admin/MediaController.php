<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Media;
use DB;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Support\Facades\File;
use Auth;

class MediaController extends Controller
{

    public function __construct(Media $media){
        $this->media = $media;
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
        //return $request->all();
        //if($request->ajax()){
            $id = Auth::user()->id;
            $medias = $this->media->from('medias as meds')
            ->leftJoin('medias_categories as meca', 'meds.media_id', 'meca.media_id');
            if($request->filled('category_id')){
                if($request->category_id == '0'){
                    $medias = $medias->whereNotExists(function($query){
                        $query->select(DB::raw(1))
                        ->whereRaw('meca.media_id = meds.media_id');
                    });
                } else {
                    $medias = $medias->where('meca.category_id', $request->category_id);
                }
            }

            $medias = $medias
            //->where('meds.media_id', 29)
            ->select([
                'meds.media_id',
                'meds.media_title',
                'meds.media_comment',
                'meds.media_url',
                'meds.created_at',
                'meca.category_id'
            ])
            ->orderBy('meds.media_id', 'DESC')
            ->paginate();

            $updatedItems = $medias->getCollection()
            ->map(function($media) use($id) {
                $media_url = $media->media_url;

                //$media->media_url = asset("storage/galleries/images/{$id}/{$media_url}");
                //$media->media_thumb_url = asset("storage/galleries/thumbnails/{$id}/{$media_url}");
                $media->media_thumb_url = $media_url;
                return $media;
            });

            $medias->setCollection($updatedItems);

            return  $medias;
        //}
    }

    /**
     * Upload new file and store it
     * @param  Request $request Request with form data: filename and file info
     * @return boolean True if success, otherwise - false
     */
    public function store(Request $request)
    {
        //return $request->all();
        $max_size   = (int)ini_get('upload_max_filesize') * 1000;
        $all_ext    = implode(',', ['jpg', 'jpeg', 'png', 'gif']);

        $request->validate([
            'media_title' => 'required',
            'media_comment' => 'required',
            'media_has_parental_control' => 'required',            
            'file' => "required|file|mimes:{$all_ext}|max:{$max_size}"
        ]);

        $file       = $request->file('file');
        $user_id    = Auth::user()->id;
        $name       = $file->getClientOriginalName();
        $ext        = $file->getClientOriginalExtension();

        try {
            DB::beginTransaction();
            $mediaCreate = $this->media->create([
                'media_title' => '$request->media_title',
                'media_comment' => $request->media_comment,
                'media_url' => "{$name}.{$ext}",
                'media_has_parental_control' => 0,
                'media_type_id' => 1,
                'user_id' => $user_id                
            ]);

            $fileName = "{$mediaCreate->media_id}.{$ext}";
            $this->media->find($mediaCreate->media_id)->update([
                'media_url' => $fileName
            ]);
            
            $width = 300; // your max width
            $height = 300; // your max height
            $imgFull = Image::make($file);
            $imgThumb = Image::make($file);
            $imgThumb->height() > $imgThumb->width() ? $width=null : $height=null;
            $imgThumb->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            });            
            $storeImg = Storage::disk('public')
                ->put("galleries/images/{$user_id}/{$fileName}", $imgFull->encode());
            $storeImgThumb = Storage::disk('public')
                ->put("galleries/thumbnails/{$user_id}/{$fileName}", $imgThumb->encode());

            if($storeImg && $storeImgThumb){
                DB::commit();
            } else {
                DB::rollback();
            }
        } catch(\Exception $e){       
            DB::rollback();
        }
        return [];
    }

    public function store2(Request $request)
    {
        $request->validate([
            //'media_id' => 'required',
            'media_title' => 'required',
            'media_comment' => 'required',
            'media_url' => 'required',
            'media_has_parental_control' => 'required',
            //'media_type_id' => 'required'
        ]);

        $this->media->create([
            'media_title' => $request->media_title,
            'media_comment' => $request->media_comment,
            'media_url' => $request->media_url,
            'media_has_parental_control' => $request->media_has_parental_control,
            'media_type_id' => 1,
            'user_id' => 1
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
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'media_id' => 'required',
            'media_title' => 'required',
            'media_comment' => 'required',
            'media_url' => 'required',
            'media_has_parental_control' => 'required',
            //'media_type_id' => 'required'
        ]);

        $this->media->find($id)->update([
            'media_title' => $request->media_title,
            'media_comment' => $request->media_comment,
            'media_url' => $request->media_url,
            'media_has_parental_control' => $request->media_has_parental_control,
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
        return $id;
    }
}
