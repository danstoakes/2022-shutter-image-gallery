<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Media;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Auth::user()->albums()->paginate(24);

        return View::make('albums.index')->with([
            'albums' => $albums,
            'albumCount' => Album::all()->count()
        ]);
    }

    public function createAlbum (Request $request)
    {
        $user = Auth::user();

        $rules = [
            'name' => 'required|string|min:4||max:50|unique:album,name,' . $user->id
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) 
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all());
        } else
        {
            $album = new Album;
            $album->name = $request->name;
            $album->user_id = $user->id;
            $album->save();
        }

        return Redirect::route('album.index')->with('success', 'Successfully created new album!');
    }

    public function add (Request $request)
    {
        $albumId = json_decode($request->album, true);
        $mediaIds = json_decode($request->media_ids, true);

        if ($albumId && $mediaIds) {
            $album = Album::find($albumId);
            $attachedIds = $album->media->pluck("id")->toArray();

            $mediaItems = Media::find(array_diff($mediaIds, $attachedIds));
            
            foreach ($mediaItems as $mediaItem) {
                $album->media()->attach($mediaItem);
            }
        }

        return Redirect::route('album.show', $album)->with('success', 'Successfully added to album!');
    }

    public function show ($id)
    {
        $album = Album::find($id);
        $media = $album->media;

        return View::make('albums.show')
            ->with([
                'album' => $album,
                'mediaCount' => $media->count(),
                'mediaItems' => $media
            ]);
    }
}
