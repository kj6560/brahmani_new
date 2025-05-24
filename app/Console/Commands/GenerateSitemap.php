<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate sitemap for Brahmani Enterprise';

    public function handle()
    {
        $baseUrl = config('app.url'); // Ensure this is set correctly in your .env file

        // Initialize the sitemap
        $sitemap = Sitemap::create();

        // Add static pages
        $sitemap->add(Url::create("{$baseUrl}/"));
        $sitemap->add(Url::create("{$baseUrl}/about-us"));
        $sitemap->add(Url::create("{$baseUrl}/contact-us"));

        // Add product categories
        $productCategories = [
            'premium-fluted-panels',
            'premium-charcoal-louvers',
            'charcoal-louvers',
            'fluted-panel',
            'pvc-louvers',
            'wpc-panels',
            'premium-wpc-panels',
            'super-heavy-panels',
            'soffit-panels',
            'pvc-panel-two-groove',
            'pvc-panel-u-groove',
            'pvc-panel-hot-stamping',
            'pu-stone-panels',
            'ultimate-super-heavy-panel',
            'moulding',
            'glass-mosaic-tiles',
            'accessories-and-gi-framing',
            'cement-sheet',
            'glass-wool',
            'gypsum-board',
            'gypsum-powder',
            'pvc-gypsum-tiles',
            't-grid',
            'floor-gaurd',
        ];

        foreach ($productCategories as $slug) {
            $sitemap->add(Url::create("{$baseUrl}/products/{$slug}"));
        }

        // Add blog and contact pages
        $sitemap->add(Url::create("{$baseUrl}/blog"));
        $sitemap->add(Url::create("{$baseUrl}/contact-us"));

        // Write the sitemap to a file
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully!');
    }
}
