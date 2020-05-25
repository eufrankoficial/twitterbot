<?php


namespace App\Services;


class Image
{
    protected $basePath = 'uploads/';

    public function getImage()
    {
        $files = \Storage::disk('local')->allFiles('public/uploads/tweet');
        $randomFile = $files[rand(1, count($files))];

        $fileName = explode('/', $randomFile);

        return collect([
            'path_file' => $randomFile,
            'filename' => $fileName[3]
        ]);
    }
}
