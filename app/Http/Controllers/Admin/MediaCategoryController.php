<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\MediaCategory;

class MediaCategoryController extends Controller
{

    public function __construct(MediaCategory $mediaCategory){
        $this->mediaCategory = $mediaCategory;
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
        return $this->mediaCategory->find($id);
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
            'new_category_id' => 'required|numeric',
            //'old_category_id' => 'required|numeric',
            //'media_id' => 'required|numeric'
        ]);
        if(is_null($request->old_category_id)){
            $this->mediaCategory->create([
                'media_id' => $id,
                'category_id' => $request->new_category_id
            ]);
        } else {
            $mediaCategory = $this->mediaCategory->where('media_id', $id)
            ->where('category_id', $request->old_category_id)
            ->update([
                'category_id' => $request->new_category_id
            ]);
            //->first();
            //return $mediaCategory;
            /*->update([
                'category_id' => $request->mediaCategory_title,
                'media_id' => $request->mediaCategory_comment,
            ]);*/
        }
        
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
