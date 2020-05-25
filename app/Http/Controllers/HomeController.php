<?php

namespace App\Http\Controllers;
use App\Services\Image;
use App\Services\TwitterService;

class HomeController extends Controller
{
    public function __construct(TwitterService $twitterServ)
    {
        $this->twitterServ = $twitterServ;
    }

    public function index()
    {
        $timeline = $this->twitterServ->timeline();
        $posts = json_decode($timeline);

        return view('home.index', compact('posts'));
    }

}
