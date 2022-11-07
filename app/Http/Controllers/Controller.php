<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    static function getLinks()
    {
        return
            [
                'instagram' => 'https://www.instagram.com/',
                'facebook' => 'https://www.facebook.com/',
                'twitter' => 'https://www.twitter.com/',
                'linkedin' => 'https://www.linkedin.com/in/',
                'github' => 'https://www.github.com/',
                'whatsapp' => 'https://wa.me/',
                'telegram' => 'https://t.me/',
                'youtube' => 'https://www.youtube.com/',
                'tiktok' => 'https://www.tiktok.com/@',
            ];
    }
}
