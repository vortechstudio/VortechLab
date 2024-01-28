<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class SitemapCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Génère le sitemap du site';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        SitemapGenerator::create(config('app.url'))
            ->getSitemap()
            ->add(Url::create('/home/timeline'))
            ->add(Url::create('/home/events'))
            ->writeToFile(public_path('sitemap.xml'));
    }
}
