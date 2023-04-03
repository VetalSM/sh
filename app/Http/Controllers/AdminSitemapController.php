<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Sitemap\SitemapGenerator;
use Psr\Http\Message\UriInterface;
use Spatie\Sitemap\Tags\Url;

class AdminSitemapController extends Controller
{
    public function index()
    {
        $sitemapPath = "ap.xml";
        SitemapGenerator::create('https://madeis.com.ua/')
            ->shouldCrawl(function (UriInterface $url) {
                // All pages will be crawled, except the contact page.
                // Links present on the contact page won't be added to the
                // sitemap unless they are present on a crawlable page.

                return strpos($url->getPath(), '/storage') === false;
            })  ->getSitemap()
            // here we add one extra link, but you can add as many as you'd like
//            ->add(Url::create('/')->setPriority(0.5))
            ->writeToFile($sitemapPath);
        return redirect('/'.app()->getLocale().'/admin')->with('success', 'sitemap generated!');
    }
}
