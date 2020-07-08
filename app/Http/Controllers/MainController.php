<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MediaRoute;
use App\Media;
use App\User;

class MainController extends Controller
{
    private $media_route_id = 2;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
/*        $request = new Request;
        $request->replace([
            'media_route_id' => $this->media_route_id, //Home
            'user_id' => 1
        ]);
        $medias = MediaRoute::getMediasWithoutGalleriesByRoute($request);
*/
        $request = new Request;
        $request->merge([
            'user_id' => User::where('email', 'like', '%fabioh%')->first()->id,
            //'gallery_id' => 0
        ]);
        $medias = Media::getMediasGalleries($request);
        $medias = $medias->map(function($media){
            $media->image = $media->media_url;
            $media->title = $media->media_title;
            return collect($media)->only(['image', 'title']);
        });
        return view('home.index')->with(
            compact('medias')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
