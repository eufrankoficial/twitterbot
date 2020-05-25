<?php

namespace App\Services;


use Twitter;

class TwitterService {


    public function timeline()
    {
        return Twitter::getHomeTimeline(['screen_name' => 'quarantineimg','count' => 20, 'format' => 'json']);
    }

    public function sendPost(array $data)
    {
        $media = \Storage::disk('local')->get($data['media']);
        $media = Twitter::uploadMedia(['media' => $media]);

        $removeMidiaFromPath = \Storage::disk('local')->delete($data['media']);
        Twitter::postTweet(['status' => $data['status'], 'media_ids' => $media->media_id_string]);
    }



}
