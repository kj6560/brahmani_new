<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate multiple sitemaps';

    public function handle()
    {
        // Generate main pages sitemap
        Sitemap::create()
            ->add(Url::create(url('/')))
            ->add(Url::create(url('/about-us')))
            ->add(Url::create(url('/contact-us')))
            ->writeToFile(public_path('sitemap-pages.xml'));


        $sitemapProducts = Sitemap::create();
        $products = Product::all();
        foreach ($products as $product) {
            $sitemapProducts->add(Url::create(url("/product/{$product->id}")));
        }
        $sitemapProducts->writeToFile(public_path('sitemap-products.xml'));


        $baseUrl = request()->getSchemeAndHttpHost(); 

        $sitemapIndex = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <sitemap>
        <url><loc>{$baseUrl}/sitemap-pages.xml</loc></url>
    </sitemap>
    <sitemap>
    <url><loc>{$baseUrl}/sitemap-products.xml</loc></url>
    </sitemap>
</sitemapindex>
XML;

        file_put_contents(public_path('sitemap.xml'), $sitemapIndex);

        $this->info('Sitemaps generated successfully!');
    }
}
