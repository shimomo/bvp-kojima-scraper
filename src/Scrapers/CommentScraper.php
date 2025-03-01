<?php

declare(strict_types=1);

namespace BVP\KojimaScraper\Scrapers;

use BVP\ScraperCore\Normalizer;
use BVP\ScraperCore\Scraper;
use Carbon\CarbonImmutable as Carbon;
use Carbon\CarbonInterface;

/**
 * @author shimomo
 */
class CommentScraper extends BaseScraper implements CommentScraperInterface
{
    /**
     * @param  string|int                           $raceCode
     * @param  \Carbon\CarbonInterface|string|null  $date
     * @return array
     */
    public function scrape(string|int $raceCode, CarbonInterface|string|null $date = null): array
    {
        return array_merge(...[
            $this->scrapeYesterday($raceCode, $date),
            $this->scrapeToday($raceCode, $date),
        ]);
    }

    /**
     * @param  string|int                           $raceCode
     * @param  \Carbon\CarbonInterface|string|null  $date
     * @return array
     *
     * @throws \RuntimeException
     */
    private function scrapeYesterday(string|int $raceCode, CarbonInterface|string|null $date = null): array
    {
        $date = Carbon::parse($date ?? 'today')->format('Ymd');
        $crawlerUrl = sprintf($this->baseUrl, $date, $raceCode);
        $crawler = Scraper::getInstance()->request('GET', $crawlerUrl);
        $comments = Scraper::filterByKeys($crawler, [
            'table.sensyu-comment > tbody > tr > td.profile-s > div.open-prof',
            'table.sensyu-comment > tbody > tr > td.comment',
        ]);

        foreach ($comments as $key => $value) {
            if (empty($value)) {
                throw new \RuntimeException(
                    __METHOD__ . "() - The specified key '{$key}' is not found " .
                    "in the content of the URL: '{$crawlerUrl}'."
                );
            }
        }

        $response = [];
        foreach (range(1, 6) as $boatNumber) {
            $racerName = $comments['table.sensyu-comment > tbody > tr > td.profile-s > div.open-prof'][$boatNumber - 1] ?? '';
            $racerName = Normalizer::normalize($racerName, ['shouldRemoveAllSpaces' => true]);
            $racerYesterdayCommentLabel = '前日コメント';
            $racerYesterdayComment = $comments['table.sensyu-comment > tbody > tr > td.comment'][$boatNumber - 1] ?? '';
            $racerYesterdayComment = Normalizer::normalize($racerYesterdayComment);

            $response['boat_number_' . $boatNumber . '_racer_name'] = $racerName;
            $response['boat_number_' . $boatNumber . '_racer_yesterday_comment_label'] = $racerYesterdayCommentLabel;
            $response['boat_number_' . $boatNumber . '_racer_yesterday_comment'] = $racerYesterdayComment;
        }

        return $response;
    }

    /**
     * @param  string|int                           $raceCode
     * @param  \Carbon\CarbonInterface|string|null  $date
     * @return array
     */
    private function scrapeToday(string|int $raceCode, CarbonInterface|string|null $date = null): array
    {
        return [];
    }
}
