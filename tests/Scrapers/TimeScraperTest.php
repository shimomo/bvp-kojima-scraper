<?php

declare(strict_types=1);

namespace BVP\KojimaScraper\Tests\Scrapers;

use BVP\KojimaScraper\Scrapers\TimeScraper;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class TimeScraperTest extends TestCase
{
    /**
     * @var \BVP\KojimaScraper\Scrapers\TimeScraper
     */
    protected TimeScraper $scraper;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->scraper = new TimeScraper();
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(TimeScraperDataProvider::class, 'scrapeProvider')]
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
            "BVP\KojimaScraper\Scrapers\TimeScraper::scrape() - " .
            "The specified key '.ren-name' is not found in the content of the URL: " .
            "'https://hj.kojima-yosou.com/hjpc/index/20240103/01'."
        );

        $this->scraper->scrape(1, '2024-01-03');
    }
}
