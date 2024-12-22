<?php

namespace App\Http\Controllers;

use App\Models\GeneralInfo;
use Illuminate\Http\Request;

class GeneralInfoController extends Controller
{

    public function edit(GeneralInfo $info)
    {
        $info = GeneralInfo::first();

        return view('profile.general.info', compact('info'));
    }

    public function update(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'menu_names' => 'required|array',
            'menu_names.*' => 'required|string|max:255',
            'show_offline_course' => 'boolean',
            'show_schedule' => 'boolean',
            'address' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:255',
            'youtube' => 'required|string|max:255',
            'vk' => 'required|string|max:255',
            'telegram_channel' => 'required|string|max:255',
            'telegram_group' => 'required|string|max:255',
            'format' => 'nullable|array',
            'format.*' => 'required|string|max:255',
            'banner_title' => 'required|string|max:255',
            'banner_subtitle' => 'required|string|max:255',
            'banner_btn_text' => 'required|string|max:70',
            'banner_image' => 'nullable|image|max:1024',
        ]);

        $info = GeneralInfo::first();

        $validated['show_offline_course'] = $request->boolean('show_offline_course');
        $validated['show_schedule'] = $request->boolean('show_schedule');

        $info->update($validated);

        return redirect()->route('general')->with([
            'status' => 'success',
            'message' => 'Информация обновлена!',
        ]);
    }
}
