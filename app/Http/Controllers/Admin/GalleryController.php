<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo_name' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $filePath = $request->file('photo')->store('galleries', 'public');

        Gallery::create([
            'photo_name' => $request->photo_name,
            'photo' => $filePath,
        ]);

        return redirect()->route('galleries.index')->with('success', 'Photo added successfully.');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'photo_name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = ['photo_name' => $request->photo_name];

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('galleries', 'public');
        }

        $gallery->update($data);

        return redirect()->route('galleries.index')->with('success', 'Photo updated successfully.');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->route('galleries.index')->with('success', 'Photo deleted successfully.');
    }

    public function showGallery()
    {
        $galleries = Gallery::all();
        return view('about', compact('galleries'));
    }
}
