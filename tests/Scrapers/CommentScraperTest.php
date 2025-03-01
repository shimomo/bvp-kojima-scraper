<?php

declare(strict_types=1);

namespace BVP\KojimaScraper\Tests\Scrapers;

use BVP\KojimaScraper\Scrapers\CommentScraper;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class CommentScraperTest extends TestCase
{
    /**
     * @var \BVP\KojimaScraper\Scrapers\CommentScraper
     */
    protected CommentScraper $scraper;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->scraper = new CommentScraper();
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(CommentScraperDataProvider::class, 'scrapeProvider')]
    public function testScrape(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->scraper->scrape(...$arguments));
    }

    /**
     * @return void
     */
    public function testScrapeWithRaceCode1AndDate20240103(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage(
            "BVP\KojimaScraper\Scrapers\CommentScraper::scrapeYesterday() - " .
            "The specified key 'table.sensyu-comment > tbody > tr > td.profile-s > div.open-prof' is not found in the content of the URL: " .
            "'https://hj.kojima-yosou.com/hjpc/index/20240103/01'."
        );

        $this->scraper->scrape(1, '2024-01-03');
    }
}
