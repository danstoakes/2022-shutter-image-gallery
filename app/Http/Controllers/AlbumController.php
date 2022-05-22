<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AlbumController extends Controller
{
    //

    public function index()
    {
        $albums = Auth::user()->albums()->paginate(24);

        return View::make('albums.index')->with([
            'albums' => $albums,
            'albumCount' => count(Album::all())
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
}
