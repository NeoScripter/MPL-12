<?php

namespace App\Http\Controllers;

use App\Models\GeneralInfo;
use App\Models\Phone;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::latest()->paginate(5);

        return view('profile.videos.videos', compact('videos'));
    }

    public function showAll()
    {
        $videos = Video::latest()->paginate(9);
        $phones = Phone::all();
        $info = GeneralInfo::first();

        return view('videos', compact('videos', 'phones', 'info'));
    }

    public function destroy(Video $video)
    {
        if ($video->image_path) {
            Storage::disk('public')->delete($video->image_path);
        }
        $video->delete();

        return redirect()->route('videos')->with([
            'status' => 'success',
            'message' => 'Видео удалено!',
        ]);
    }

    public function edit(Video $video)
    {
        return view('profile.videos.edit-video', compact('video'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'link' => 'nullable|string',
        ]);

        Video::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'link' => $validated['link'],
        ]);

        return redirect()->route('videos')->with([
            'status' => 'success',
            'message' => 'Видео успешно создано!',
        ]);
    }

    public function update(Request $request, Video $video)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'link' => 'nullable|string',
        ]);

        $video->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'link' => $validated['link'],
        ]);


        return redirect()->route('videos')->with([
            'status' => 'success',
            'message' => 'Видео успешно обновлено!',
        ]);
    }
}
