<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Vmorozov\FileUploads\Uploader;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $next="portrait";
        $images=Image::get();
           $sorted = $images->sortByDesc('created_at');
            if($sorted->first())
            {
                $last=$sorted->first()->orientation;
                    if($sorted->skip(1)->first())
                    {
                        $lastButOne=$sorted->skip(1)->first()->orientation;
                           if(($last==$lastButOne) )
                           {
                                $next="landscape";
                           }else
                           {
                                $next="portrait";
                           }

                    }
           }
           



        return view('dashboard', compact('images','next'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
         $validated = $request->validate([
        'orentation' => 'required',
        'fileToUpload' => 'required|mimes:jpg,bmp,png',
    ]);

       $name= Uploader::uploadFile($request->file('fileToUpload'));

        $Image=Image::create([
         'orientation'=> $request->orentation,
         'name'=> $name,
     ]);
        return redirect('dashboard')->with('msg', 'image uploaded');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
