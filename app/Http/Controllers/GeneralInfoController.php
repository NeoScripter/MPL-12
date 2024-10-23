<?php

namespace App\Http\Controllers;

use App\Models\GeneralInfo;
use Illuminate\Http\Request;

class GeneralInfoController extends Controller
{
    public function index()
    {
        $info = GeneralInfo::all();

        return view('profile.general.info', compact('info'));
    }

    public function edit(GeneralInfo $info)
    {
        return view('profile.general.edit', compact('info'));
    }

    public function update(Request $request, GeneralInfo $info)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'menu_names' => 'required|array',
            'menu_names.*' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:255',
            'youtube' => 'required|string|max:255',
            'vk' => 'required|string|max:255',
            'telegram_channel' => 'required|string|max:255',
            'telegram_group' => 'required|string|max:255',
        ]);

        // Update the general info with the validated data
        $info->update([
            'menu_names' => $validated['menu_names'],
            'address' => $validated['address'],
            'whatsapp' => $validated['whatsapp'],
            'youtube' => $validated['youtube'],
            'vk' => $validated['vk'],
            'telegram_channel' => $validated['telegram_channel'],
            'telegram_group' => $validated['telegram_group'],
        ]);

        return redirect()->route('general')->with([
            'status' => 'success',
            'message' => 'Информация обновлена!',
        ]);
    }
}
