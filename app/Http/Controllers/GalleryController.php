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
        $this->middleware('auth', ['except' => ['index']]);
    }

    public function index()
    {
        $galleries =  Gallery::with('user')->orderBy('id', 'desc')->paginate(10);
        if ($galleries->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'There are no galleries created',
            ], 404);
        };
        return $galleries;
    }

    public function show($id)
    {
        return Gallery::with('user')->with('comments')->findOrFail($id);
    }

    public function store(GalleryRequest $request)
    {
        if (!$request->input('description')) {
            $request->merge(['description' => '']);
        }
        $newGallery = $request->all();
        $newGallery['user_id'] = Auth::user()->id;
        return Gallery::create($newGallery);
    }

    public function update(GalleryRequest $request, $id)
    {
        if (!$request->input('description')) {
            $request->merge(['description' => '']);
        }
        return Gallery::findOrFail($id)->update($request->all());
    }

    public function destroy($id)
    {
        return Gallery::destroy($id);
    }
}
