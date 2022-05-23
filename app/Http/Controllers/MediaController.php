<?php

namespace App\Http\Controllers;

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
