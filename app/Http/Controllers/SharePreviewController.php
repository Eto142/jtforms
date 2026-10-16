<?php

namespace App\Http\Controllers;

use App\Models\SharedPost;

class SharePreviewController extends Controller
{
    public function show(string $token)
    {
        $post = SharedPost::where('token', $token)->firstOrFail();

        return view('shared_post_preview', compact('post'));
    }
}