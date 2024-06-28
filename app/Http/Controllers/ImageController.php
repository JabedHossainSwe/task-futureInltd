<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return view('images.index', compact('images'));
    }

    public function create()
    {
        return view('images.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public', $imageName);

        Image::create([
            'file_name' => $imageName,
            'file_path' => $imageName,
        ]);

        return redirect()->route('images.index')
            ->with('success', 'Image uploaded successfully.');
    }

    public function show(Image $image)
    {
        return view('images.show', compact('image'));
    }

    public function edit(Image $image)
    {
        return view('images.edit', compact('image'));
    }

    public function update(Request $request, Image $image)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            Storage::delete('public/' . $image->file_path);
            $path = $request->file('image')->store('images', 'public');
            $image->update([
                'file_name' => $request->file('image')->getClientOriginalName(),
                'file_path' => $path,
            ]);
        }

        return redirect()->route('images.index');
    }

    public function destroy(Image $image)
    {
        Storage::delete('public/' . $image->file_path);
        $image->delete();
        return redirect()->route('images.index');
    }
}
