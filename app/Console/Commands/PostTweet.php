<?php

namespace App\Console\Commands;

use App\Services\TwitterService;
use Illuminate\Console\Command;
use App\Services\Image;

class PostTweet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:post-tweet';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to post new tweet';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Image $image, TwitterService $twitterServ)
    {
        parent::__construct();
        $this->image = $image;
        $this->twitterServ = $twitterServ;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $tweet = [
            'media' => $this->image->getImage()['path_file'],
            'status' => '#quarantine #images #isolation #tech #twitter #art #photography'
        ];

        $tweet = $this->twitterServ->sendPost($tweet);

        return $tweet;
    }
}
