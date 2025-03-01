<?php

declare(strict_types=1);

namespace BVP\KojimaScraper\Tests;

use BVP\KojimaScraper\ScraperCore;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class ScraperCoreTest extends TestCase
{
    /**
     * @var \BVP\KojimaScraper\ScraperCore
     */
    protected ScraperCore $scraper;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->scraper = new ScraperCore();
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(ScraperCoreDataProvider::class, 'scrapeCommentsProvider')]
    public function testScrapeComments(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->scraper->scrapeComments(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(ScraperCoreDataProvider::class, 'scrapeForecastsProvider')]
    public function testScrapeForecasts(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->scraper->scrapeForecasts(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(ScraperCoreDataProvider::class, 'scrapeTimesProvider')]
    public function testScrapeTimes(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->scraper->scrapeTimes(...$arguments));
    }

    /**
     * @return void
     */
    public function testScrapeCommentsWithRaceCode1AndDate20240103(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage(
            "BVP\KojimaScraper\Scrapers\CommentScraper::scrapeYesterday() - " .
            "The specified key 'table.sensyu-comment > tbody > tr > td.profile-s > div.open-prof' is not found in the content of the URL: " .
            "'https://hj.kojima-yosou.com/hjpc/index/20240103/01'."
        );

        $this->scraper->scrapeComments(1, '2024-01-03');
    }

    /**
     * @return void
     */
    public function testScrapeForecastsWithRaceCode1AndDate20240103(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage(
            "BVP\KojimaScraper\Scrapers\ForecastScraper::scrapeYesterday() - " .
            "The specified key 'table.kojima-table.neraime-table > tbody > tr > td > span.num-box' is not found in the content of the URL: " .
            "'https://hj.kojima-yosou.com/hjpc/index/20240103/01'."
        );

        $this->scraper->scrapeForecasts(1, '2024-01-03');
    }

    /**
     * @return void
     */
    public function testScrapeTimesWithRaceCode1AndDate20240103(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage(
            "BVP\KojimaScraper\Scrapers\TimeScraper::scrape() - " .
            "The specified key '.ren-name' is not found in the content of the URL: " .
            "'https://hj.kojima-yosou.com/hjpc/index/20240103/01'."
        );

        $this->scraper->scrapeTimes(1, '2024-01-03');
    }
}
