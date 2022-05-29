<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class MediaController extends Controller
{
    public function library (Request $request)
    {
        $images = Auth::user()->getMedia("images")->sortByDesc('id');

        return View::make('library')->with([
            'mediaItems' => $images,
            'mediaCount' => count($images)
        ]);
    }

    public function albums (Request $request)
    {

    }

    public function favourites (Request $request)
    {
        $media = Auth::user()->getMedia("images")->where("is_favourite", true);

        return View::make('favourites')->with([
            'mediaItems' => $media,
            'mediaCount' => count($media)
        ]);
    }

    public function recents (Request $request)
    {

    }

    public function hidden (Request $request)
    {

    }

    public function export (Request $request)
    {

    }

    public function deleted (Request $request)
    {

    } 

    public function deleteMedia (Request $request, $id)
    {
        $image = Media::find($id);
        $image->delete();

        return Redirect::route('library')->with('success', 'Successfully deleted media!');
    }

    public function updateMedia (Request $request)
    {
        $rules = [
            "name" => "required"
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator);
        } else {
            $image = Media::find($request->image);
            $image->name = $request->name;
    
            if ($request->has("caption"))
                $image->caption = $request->caption;
    
            $image->save();
        }

        return Redirect::route('library')->with('success', 'Successfully updated media!');
    }

    public function uploadMedia (Request $request)
    {
        $rules = [
            'image' => 'required|max:10',
            'image.*' => 'image|mimes:jpeg,png,jpg|max:8192'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator);
        } else {
            $user = Auth::user();

            foreach ($request->image as $photo) 
            {
                if ($photo && $photo->isValid()){
                    $user->addMedia($photo)
                        ->toMediaCollection('images');
                }
            }
        }

        return Redirect::route('library')->with('success', 'Successfully created new album!');
    }
}
