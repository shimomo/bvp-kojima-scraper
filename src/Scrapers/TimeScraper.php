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
class TimeScraper extends BaseScraper implements TimeScraperInterface
{
    /**
     * @param  string|int                           $raceCode
     * @param  \Carbon\CarbonInterface|string|null  $date
     * @return array
     *
     * @throws \RuntimeException
     */
    public function scrape(string|int $raceCode, CarbonInterface|string|null $date = null): array
    {
        $date = Carbon::parse($date ?? 'today')->format('Ymd');
        $crawlerUrl = sprintf($this->baseUrl, $date, $raceCode);
        $crawler = Scraper::getInstance()->request('GET', $crawlerUrl);
        $times = Scraper::filterByKeys($crawler, [
            '.ren-name',
            '.ren-tenji',
            '.control',
        ]);

        foreach ($times as $key => $value) {
            if (empty($value)) {
                throw new \RuntimeException(
                    __METHOD__ . "() - The specified key '{$key}' is not found " .
                    "in the content of the URL: '{$crawlerUrl}'."
                );
            }
        }

        $response = [];
        $chunkTimes = array_chunk($times['.control'], 5);
        foreach (range(1, 6) as $boatNumber) {
            $racerName = $times['.ren-name'][$boatNumber - 1] ?? '';
            $racerName = Normalizer::normalize($racerName, ['shouldRemoveAllSpaces' => true]);
            $racerExhibitionTime = Normalizer::normalize($times['.ren-tenji'][$boatNumber - 1] ?? 0.0);
            $racerLapTime = Normalizer::normalize($chunkTimes[$boatNumber - 1][2] ?? 0.0);
            $racerTurnTime = Normalizer::normalize($chunkTimes[$boatNumber - 1][3] ?? 0.0);
            $racerStraightTime = Normalizer::normalize($chunkTimes[$boatNumber - 1][4] ?? 0.0);

            $response['boat_number_' . $boatNumber . '_racer_name'] = $racerName;
            $response['boat_number_' . $boatNumber . '_racer_exhibition_time'] = $racerExhibitionTime;
            $response['boat_number_' . $boatNumber . '_racer_lap_time'] = $racerLapTime;
            $response['boat_number_' . $boatNumber . '_racer_turn_time'] = $racerTurnTime;
            $response['boat_number_' . $boatNumber . '_racer_straight_time'] = $racerStraightTime;
        }

        return $response;
    }
}
