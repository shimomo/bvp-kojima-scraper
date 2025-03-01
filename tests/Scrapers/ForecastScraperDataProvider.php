<?php

declare(strict_types=1);

namespace BVP\KojimaScraper\Tests\Scrapers;

/**
 * @author shimomo
 */
final class ForecastScraperDataProvider
{
    /**
     * @return array
     */
    public static function scrapeProvider(): array
    {
        return [
            [
                'arguments' => [1, '2024-01-01'],
                'expected' => [
                    'reporter_yesterday_course_label' => '記者予想 前日コース',
                    'reporter_yesterday_course' => '123/456',
                    'reporter_yesterday_comment_label' => '記者予想 前日コメント',
                    'reporter_yesterday_comment' => '予選では白星のなかった立間だが、年明けは気分一新。本領のまくり差しで白星だ。同体Sなら浮田の逃げも。福田が外マイ。',
                    'reporter_yesterday_focus_label' => '記者予想 前日フォーカス',
                    'reporter_yesterday_focus' => ['5=1', '5-3', '5-6', '5=1-3', '5=1-6'],
                    'reporter_yesterday_focus_exacta_label' => '記者予想 前日フォーカス 2連単',
                    'reporter_yesterday_focus_exacta' => ['5=1', '5-3', '5-6'],
                    'reporter_yesterday_focus_trifecta_label' => '記者予想 前日フォーカス 3連単',
                    'reporter_yesterday_focus_trifecta' => ['5=1-3', '5=1-6'],
                ],
            ],
            [
                'arguments' => [11, '2024-01-01'],
                'expected' => [
                    'reporter_yesterday_course_label' => '記者予想 前日コース',
                    'reporter_yesterday_course' => '123/456',
                    'reporter_yesterday_comment_label' => '記者予想 前日コメント',
                    'reporter_yesterday_comment' => 'オール3連対で予選を戦い抜いた藤原啓が地元3連続優出へイン一気。レース足上々の林が差す。岡瀬が外マイ。入海が猛追。',
                    'reporter_yesterday_focus_label' => '記者予想 前日フォーカス',
                    'reporter_yesterday_focus' => ['1=2', '1-3', '1-4', '1=2-3', '1=2-4'],
                    'reporter_yesterday_focus_exacta_label' => '記者予想 前日フォーカス 2連単',
                    'reporter_yesterday_focus_exacta' => ['1=2', '1-3', '1-4'],
                    'reporter_yesterday_focus_trifecta_label' => '記者予想 前日フォーカス 3連単',
                    'reporter_yesterday_focus_trifecta' => ['1=2-3', '1=2-4'],
                ],
            ],
        ];
    }
}
