<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\RecycledMedia;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class MediaController extends Controller
{
    public function library (Request $request)
    {
        $images = Auth::user()->getMedia("images")->whereNotIn("id", RecycledMedia::all()->pluck("media_id")->toArray())->sortByDesc('id');

        return View::make('library')->with([
            'mediaItems' => $images,
            'mediaCount' => count($images),
            'title' => 'Library'
        ]);
    }

    public function albums (Request $request)
    {

    }

    public function favourite (Request $request)
    {
        $mediaId = json_decode($request->id, true);

        if ($mediaId)
        {
            $mediaItem = Media::find($mediaId);

            if ($mediaItem)
                $mediaItem->is_favourite = !$mediaItem->is_favourite;

            $mediaItem->save();
        }
    }

    public function favourites (Request $request)
    {
        $media = Auth::user()->getMedia("images")->where("is_favourite", true);

        return View::make('library')->with([
            'mediaItems' => $media,
            'mediaCount' => count($media),
            'title' => 'Favourites'
        ]);
    }

    public function recents (Request $request)
    {
        $endDate = date("Y-m-d H:i:s");
        $startDate = date("Y-m-d H:i:s", strtotime("-1 week"));

        $images = Auth::user()->getMedia("images")->whereBetween("updated_at", [$startDate, $endDate])->sortByDesc("id");

        return View::make('library')->with([
            'mediaItems' => $images,
            'mediaCount' => count($images),
            'title' => 'Recents'
        ]);
    }

    public function hidden (Request $request)
    {
        $media = Auth::user()->getMedia("images")->where("is_hidden", true);

        return View::make('library')->with([
            'mediaItems' => $media,
            'mediaCount' => count($media),
            'title' => 'Hidden'
        ]);
    }

    public function recycle (Request $request)
    {
        $mediaId = json_decode($request->id, true);

        if ($mediaId)
        {
            $mediaItem = Media::find($mediaId);

            if ($mediaItem)
            {
                $recycledMedia = new RecycledMedia;
                $recycledMedia->media_id = $mediaId;
                $recycledMedia->expiry_date = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " + 30 days"));
                $recycledMedia->save();
            }
        }
    }

    public function recycled (Request $request)
    {
        $media = Auth::user()->getMedia("images")->whereIn("id", RecycledMedia::all()->pluck("media_id")->toArray())->sortByDesc('id');

        return View::make('library')->with([
            'mediaItems' => $media,
            'mediaCount' => count($media),
            'title' => 'Recycle bin'
        ]);
    }

    public function deleteMedia (Request $request, $id)
    {
        $request->merge(['id' => $id]);
        $this->recycle($request);

        // $image = Media::find($id);
        // $image->delete();

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
