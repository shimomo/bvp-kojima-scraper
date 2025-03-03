<?php

declare(strict_types=1);

namespace BVP\KojimaScraper\Tests;

use BVP\KojimaScraper\Scraper;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class ScraperTest extends TestCase
{
    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(ScraperCoreDataProvider::class, 'scrapeCommentsProvider')]
    public function testScrapeComments(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Scraper::scrapeComments(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(ScraperDataProvider::class, 'scrapeForecastsProvider')]
    public function testScrapeForecasts(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Scraper::scrapeForecasts(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(ScraperDataProvider::class, 'scrapeTimesProvider')]
    public function testScrapeTimes(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Scraper::scrapeTimes(...$arguments));
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

        Scraper::scrapeComments(1, '2024-01-03');
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

        Scraper::scrapeForecasts(1, '2024-01-03');
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

        Scraper::scrapeTimes(1, '2024-01-03');
    }

    /**
     * @return void
     */
    public function testInvalidWithRaceCode1AndDate20240103(): void
    {
        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage(
            "BVP\KojimaScraper\ScraperCore::__call() - " .
            "Call to undefined method 'BVP\KojimaScraper\ScraperCore::invalid()'."
        );

        Scraper::invalid(1, '2024-01-03');
    }
}
