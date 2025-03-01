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
class ForecastScraper extends BaseScraper
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
        $forecasts = Scraper::filterByKeys($crawler, [
            'table.kojima-table.neraime-table > tbody > tr > td > span.num-box',
            'table.kojima-table.neraime-table > tbody > tr > td.data.comment',
            'table.kojima-table.neraime-table > tbody > tr > td.focus > table.yosou-focus > tbody > tr > td > div',
        ]);

        foreach ($forecasts as $key => $value) {
            if (empty($value)) {
                throw new \RuntimeException(
                    __METHOD__ . "() - The specified key '{$key}' is not found " .
                    "in the content of the URL: '{$crawlerUrl}'."
                );
            }
        }

        $reporterYesterdayCourseLabel = '記者予想 前日コース';
        $reporterYesterdayCommentLabel = '記者予想 前日コメント';
        $reporterYesterdayFocusLabel = '記者予想 前日フォーカス';
        $reporterYesterdayFocusExactaLabel = '記者予想 前日フォーカス 2連単';
        $reporterYesterdayFocusTrifectaLabel = '記者予想 前日フォーカス 3連単';

        $reporterYesterdayCourse = Normalizer::normalize(implode($forecasts['table.kojima-table.neraime-table > tbody > tr > td > span.num-box']));
        $reporterYesterdayComment = Normalizer::normalize($forecasts['table.kojima-table.neraime-table > tbody > tr > td.data.comment'][0] ?? '');
        $reporterYesterdayFocus = $forecasts['table.kojima-table.neraime-table > tbody > tr > td.focus > table.yosou-focus > tbody > tr > td > div'];
        $reporterYesterdayFocus = Normalizer::normalize($reporterYesterdayFocus, ['shouldRemoveAllSpaces' => true]);
        $reporterYesterdayFocusExacta = array_values(array_filter($reporterYesterdayFocus, function ($focus) {
            return (substr_count($focus, '-') + substr_count($focus, '=')) === 1;
        }));
        $reporterYesterdayFocusTrifecta = array_values(array_filter($reporterYesterdayFocus, function ($focus) {
            return (substr_count($focus, '-') + substr_count($focus, '=')) === 2;
        }));

        return [
            'reporter_yesterday_course_label' => $reporterYesterdayCourseLabel,
            'reporter_yesterday_course' => $reporterYesterdayCourse,
            'reporter_yesterday_comment_label' => $reporterYesterdayCommentLabel,
            'reporter_yesterday_comment' => $reporterYesterdayComment,
            'reporter_yesterday_focus_label' => $reporterYesterdayFocusLabel,
            'reporter_yesterday_focus' => $reporterYesterdayFocus,
            'reporter_yesterday_focus_exacta_label' => $reporterYesterdayFocusExactaLabel,
            'reporter_yesterday_focus_exacta' => $reporterYesterdayFocusExacta,
            'reporter_yesterday_focus_trifecta_label' => $reporterYesterdayFocusTrifectaLabel,
            'reporter_yesterday_focus_trifecta' => $reporterYesterdayFocusTrifecta,
        ];
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
