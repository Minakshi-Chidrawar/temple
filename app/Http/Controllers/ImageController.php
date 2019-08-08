<?php

namespace App\Http\Controllers;

use File;
use App\Image;
use App\Album;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::get();

        return view('gallery.createAlbum', compact('images'));
    }

    public function gallery()
    {
        $gallery = Album::with('images')
                            ->orderBy('created_at', 'desc')
                            ->paginate(12);

        return view('gallery.gallery', compact('gallery'));
    }

    public function show($id)
    {
        $gallery = Album::findOrFail($id);

        return view('gallery.images', compact('gallery'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'album' => 'required|min:3|max:50',
            'image' => 'required'
        ]);
        
        $album = Album::create([
            'name' => $request->get('album')
        ]);

        if($request->hasFile('image'))
        {
            foreach ($request->file('image') as $image)
            {
                $path = $image->store('uploads', 'public');
                Image::create([
                    'name' => $path,
                    'album_id' => $album->id
                ]);
            }
        }

        //return "<div class='alert alert-success'>Album created successfully!</div>";->with('message', 'Album created successfully!')
        return redirect()->route('gallery');
    }

    public function addImage(Request $request)
    {
        $albumId = request('id');

        if($request->hasFile('image'))
        {
            foreach ($request->file('image') as $image)
            {
                $path = $image->store('uploads', 'public');
                Image::create([
                    'name' => $path,
                    'album_id' => $albumId
                ]);
            }
        }

        return redirect()->back()->with('message', 'Image/s added successfully!');
    }

    public function destroy()
    {
        $id = request('id');

        $image = Image::findOrFail($id);
        $filename = $image->name;
        $image->delete();

        \Storage::delete('public/'.$filename);
        return redirect()->back()->with('message', 'Image deleted successfully!');
    }
}
