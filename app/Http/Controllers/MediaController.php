<?php

namespace App\Http\Controllers;

use App\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $media = Media::all();
        return view('media',compact('media'));
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
        request()->validate([
            'filename' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',],
            [
            'filename.max' => 'please upload image size less then 2MB',
            'filename.mimes' => 'file is not supported only jpeg,png,jpg,gif,svg'
        ]);
        $media = new Media();

        if ($request->hasFile('filename')){
            $avatar = $request->filename->getClientOriginalName();
            $fileextension = $request->filename->extension();
            $mime = $request->filename->getClientMimeType();
            $size = $request->filename->getSize();

            $upload = $request->filename->storeAs('avatar',$avatar,'public');
            /* First method to store image with widht and height
            $imagesize = getimagesize("storage/".$upload);
            $width = $imagesize[0];
            $height = $imagesize[1];
            */
            //Below is second method to store image with width and height
            list($width, $height) = getimagesize($request->file('filename'));
            // list($width, $height) = getimagesize("storage/".$upload);

            // dd([$width,$height]);
        }
        $media->filename = $avatar;
        $media->path = $upload;
        $media->size = $size;
        $media->mime = $mime;
        $media->width = $width;
        $media->height = $height;
        $media->extension = $fileextension;


        $media->save();

        return redirect()->back()->with('status','image uploaded successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $media)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media $media)
    {
        //
    }
}
