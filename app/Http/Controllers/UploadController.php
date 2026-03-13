<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function uploadPublic(Request $request)
    {
        $request->validate([
            'avatar' => ['required', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
        ]);

        // Store here
        $path = $request->file('avatar')->store('avatars', 'public');

        $path = asset('storage/' . $path);

        return back()->with('success', 'Avatar uploadé : ' . $path);
    }

    public function uploadPrivate(Request $request)
    {
        $request->validate([
            'pdf' => ['required', 'mimes:pdf', 'max:5120'],
        ]);

        // Store here
        $path = $request->file('pdf')->store('private/documents');

        return back()->with('success', 'PDF uploadé : ' . $path);
    }
}
