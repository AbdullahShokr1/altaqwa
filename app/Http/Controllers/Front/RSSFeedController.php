<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Settings;
use Illuminate\Http\Request;

class RSSFeedController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        $settings = Settings::query()->first();

        return response()->view('frontend.rss', [
            'posts' => $posts,
            'settings' => $settings,
        ])->header('Content-Type', 'application/xml');
    }
    public function redirect()
    {
        return redirect()->route('home.rss')->header('Content-Type', 'application/xml');
    }
}
