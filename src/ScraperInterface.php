<?php

declare(strict_types=1);

namespace BVP\KojimaScraper;

/**
 * @author shimomo
 */
interface ScraperInterface extends ScraperContractInterface
{
    /**
     * @param  \BVP\KojimaScraper\ScraperCoreInterface
     * @return \BVP\KojimaScraper\ScraperInterface
     */
    public static function getInstance(?ScraperCoreInterface $scraperCore = null): ScraperInterface;

    /**
     * @param  \BVP\KojimaScraper\ScraperCoreInterface
     * @return \BVP\KojimaScraper\ScraperInterface
     */
    public static function createInstance(?ScraperCoreInterface $scraperCore = null): ScraperInterface;

    /**
     * @return void
     */
    public static function resetInstance(): void;
}
