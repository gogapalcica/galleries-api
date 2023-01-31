<?php

namespace App\Http\Controllers;

use App\Http\Requests\GalleryRequest;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index']]);
    }

    public function index()
    {
        $galleries = Gallery::with('user')->latest()->paginate(10);

        return $galleries;

    }

    public function show($id)
    {
        return Gallery::findOrFail($id);
    }

    public function store(GalleryRequest $request)
    {
        $newGallery = $request->all();
        $newGallery['user_id'] = Auth::user()->id;
        return Gallery::create($newGallery);
    }

    public function update(GalleryRequest $request, $id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->update($request->all());
        return $gallery;
    }

    public function destroy($id)
    {
        return Gallery::destroy($id);
    }
}
