<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'file' => ['required', 'image', 'max:4096'],
        ]);

        $path = $validated['file']->store('uploads', 'public');

        return response()->json(['path' => $path]);
    }
}
