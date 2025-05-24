<?php

namespace App\Console\Commands;

use App\Models\BlogPost;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate sitemap for Brahmani Enterprise (with changefreq and priority)';

    public function handle()
    {
        $baseUrl = config('app.url');
        $now = Carbon::now()->toAtomString();

        $urls = [];

        // Static pages
        $urls[] = [
            'loc' => "{$baseUrl}/",
            'lastmod' => $now,
            'changefreq' => 'daily',
            'priority' => '1.0',
        ];

        $urls[] = [
            'loc' => "{$baseUrl}/about-us",
            'lastmod' => $now,
            'changefreq' => 'monthly',
            'priority' => '0.8',
        ];

        $urls[] = [
            'loc' => "{$baseUrl}/contact-us",
            'lastmod' => $now,
            'changefreq' => 'yearly',
            'priority' => '0.5',
        ];

        // Product categories
        $productCategories = ProductCategory::distinct('pro_cat_slug')->pluck('pro_cat_slug')->toArray();
        foreach ($productCategories as $slug) {
            $urls[] = [
                'loc' => "{$baseUrl}/product_category/{$slug}",
                'lastmod' => $now,
                'changefreq' => 'weekly',
                'priority' => '0.9',
            ];
        }

        // Products Pages
        $products = Product::distinct('product_slug')->pluck('product_slug')->toArray();
        foreach ($products as $slug) {
            $urls[] = [
                'loc' => "{$baseUrl}/products/{$slug}",
                'lastmod' => $now,
                'changefreq' => 'weekly',
                'priority' => '0.9',
            ];
        }

        //blogs
        $blogs = BlogPost::distinct('slug')->pluck('slug')->toArray();
        foreach ($blogs as $slug) {
            $urls[] = [
                'loc' => "{$baseUrl}/blog_detail/{$slug}",
                'lastmod' => $now,
                'changefreq' => 'weekly',
                'priority' => '0.9',
            ];
        }
        // Build the XML string manually
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        foreach ($urls as $url) {
            $xml .= '<url>';
            $xml .= '<loc>' . htmlspecialchars($url['loc'], ENT_XML1) . '</loc>';
            $xml .= '<lastmod>' . $url['lastmod'] . '</lastmod>';
            $xml .= '<changefreq>' . $url['changefreq'] . '</changefreq>';
            $xml .= '<priority>' . $url['priority'] . '</priority>';
            $xml .= '</url>';
        }
        $xml .= '</urlset>';

        // Write to public/sitemap.xml
        file_put_contents(public_path('sitemap.xml'), $xml);

        $this->info('✅ Sitemap.xml manually generated with changefreq and priority.');
    }
}
