<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

class HouseScraper extends Command
{
    protected $signature = 'scrape:houses';
    protected $description = 'Scrape houses from a website';

    public function handle()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://example.com/houses');
        $html = $response->getBody()->getContents();

        $crawler = new Crawler($html);

        // Replace the following with your actual scraping logic
        $crawler->filter('.house-listing')->each(function ($node) {
            $title = $node->filter('.title')->text();
            $price = $node->filter('.price')->text();

            $this->info("Title: $title, Price: $price");
        });
    }
}
