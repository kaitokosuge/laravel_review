<?php

namespace App\Http\Controllers\Ogp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Goutte\Client;
use App\Models\Ogp;
use Exception;

class OgpController extends Controller
{
    public $test = 'hello';

    public function index(Ogp $ogp)
    {
        return view('ogp.index')->with(['ogps' => $ogp->getNewPost()]);
    }
    public function store(Request $request, Ogp $ogp)
    {
        $url = $request->url;
        $client = new Client();
        $crawler = $client->request('GET', $url);
        $ogpTitle = $crawler->filter('meta[property="og:title"]')->count() > 0
            ? $crawler->filter('meta[property="og:title"]')->attr('content') : $crawler->filter('title')->text();
        $ogpImage = $crawler->filter('meta[property="og:image"]')->count() > 0
            ? $crawler->filter('meta[property="og:image"]')->attr("content") : 'https://kaiton-blog.space/img/pen.png';

        $ogpDescription = $crawler->filter('meta[property="og:description"]')->count() > 0
            ? $crawler->filter('meta[property="og:description"]')->attr("content") : 'no desc';

        $ogp->title = $ogpTitle;
        $ogp->image = $ogpImage;
        $ogp->description = $ogpDescription;
        $ogp->url = $url;
        $ogp->save();

        return redirect('/ogp');
    }
}
