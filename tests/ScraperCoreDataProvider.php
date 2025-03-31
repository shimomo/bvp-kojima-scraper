<?php

declare(strict_types=1);

namespace BVP\KojimaScraper\Tests;

/**
 * @author shimomo
 */
final class ScraperCoreDataProvider
{
    /**
     * @return array
     */
    public static function scrapeCommentsProvider(): array
    {
        return [
            [
                'arguments' => [1, '2024-01-01'],
                'expected' => [
                    'boat_number_1_racer_name' => '浮田圭浩',
                    'boat_number_1_racer_yesterday_comment_label' => '前日コメント',
                    'boat_number_1_racer_yesterday_comment' => '4日目は展開があって3着になれた。',
                    'boat_number_2_racer_name' => '阪本勇介',
                    'boat_number_2_racer_yesterday_comment_label' => '前日コメント',
                    'boat_number_2_racer_yesterday_comment' => '*8Rは1号艇でスローの4コースとなり3着',
                    'boat_number_3_racer_name' => '福田理',
                    'boat_number_3_racer_yesterday_comment_label' => '前日コメント',
                    'boat_number_3_racer_yesterday_comment' => '安定板が付いた後半は悪くなかった。乗り心地を求めて調整する。',
                    'boat_number_4_racer_name' => '峰重力也',
                    'boat_number_4_racer_yesterday_comment_label' => '前日コメント',
                    'boat_number_4_racer_yesterday_comment' => '変わらず足は普通。自分次第。',
                    'boat_number_5_racer_name' => '立間充宏',
                    'boat_number_5_racer_yesterday_comment_label' => '前日コメント',
                    'boat_number_5_racer_yesterday_comment' => 'ダメ。(2Rは3コースから4着、12Rは2コースから粘って3着)',
                    'boat_number_6_racer_name' => '山下昂大',
                    'boat_number_6_racer_yesterday_comment_label' => '前日コメント',
                    'boat_number_6_racer_yesterday_comment' => '今節は合わせ切れていない。エンジンは悪くないと思う。',
                ],
            ],
            [
                'arguments' => [11, '2024-01-01'],
                'expected' => [
                    'boat_number_1_racer_name' => '藤原啓史朗',
                    'boat_number_1_racer_yesterday_comment_label' => '前日コメント',
                    'boat_number_1_racer_yesterday_comment' => '安定板が付いたせいか出足がなかった。合えばバランス型で上位。',
                    'boat_number_2_racer_name' => '林祐介',
                    'boat_number_2_racer_yesterday_comment_label' => '前日コメント',
                    'boat_number_2_racer_yesterday_comment' => '足は変わらずいい。行き足が良くてSしやすいし、乗り心地もいい。',
                    'boat_number_3_racer_name' => '岡瀬正人',
                    'boat_number_3_racer_yesterday_comment_label' => '前日コメント',
                    'boat_number_3_racer_yesterday_comment' => '安定板にチルト0で対応。バランスを取った分少し伸びは落ちた。',
                    'boat_number_4_racer_name' => '入海馨',
                    'boat_number_4_racer_yesterday_comment_label' => '前日コメント',
                    'boat_number_4_racer_yesterday_comment' => '序盤よりだいぶ良くなって戦える。足は普通。何か特徴を付けたい。',
                    'boat_number_5_racer_name' => '渡邉和将',
                    'boat_number_5_racer_yesterday_comment_label' => '前日コメント',
                    'boat_number_5_racer_yesterday_comment' => '毎回ペラは叩いている。安定板が付いた方が足も乗り心地もいい。',
                    'boat_number_6_racer_name' => '平尾崇典',
                    'boat_number_6_racer_yesterday_comment_label' => '前日コメント',
                    'boat_number_6_racer_yesterday_comment' => 'ペラの合わせ方次第だが、ミスしている。',
                ],
            ],
        ];
    }

    /**
     * @return array
     */
    public static function scrapeForecastsProvider(): array
    {
        return [
            [
                'arguments' => [1, '2024-01-01'],
                'expected' => [
                    'reporter_yesterday_comment_label' => '記者予想 前日コメント',
                    'reporter_yesterday_comment' => '予選では白星のなかった立間だが、年明けは気分一新。本領のまくり差しで白星だ。同体Sなら浮田の逃げも。福田が外マイ。',
                    'reporter_yesterday_course_label' => '記者予想 前日コース',
                    'reporter_yesterday_course' => '123/456',
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
                    'reporter_yesterday_comment_label' => '記者予想 前日コメント',
                    'reporter_yesterday_comment' => 'オール3連対で予選を戦い抜いた藤原啓が地元3連続優出へイン一気。レース足上々の林が差す。岡瀬が外マイ。入海が猛追。',
                    'reporter_yesterday_course_label' => '記者予想 前日コース',
                    'reporter_yesterday_course' => '123/456',
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

    /**
     * @return array
     */
    public static function scrapeTimesProvider(): array
    {
        return [
            [
                'arguments' => [1, '2024-01-01'],
                'expected' => [
                    'boat_number_1_racer_name' => '浮田圭浩',
                    'boat_number_1_racer_exhibition_time' => 6.70,
                    'boat_number_1_racer_lap_time' => 36.87,
                    'boat_number_1_racer_turn_time' => 5.85,
                    'boat_number_1_racer_straight_time' => 6.53,
                    'boat_number_2_racer_name' => '阪本勇介',
                    'boat_number_2_racer_exhibition_time' => 6.64,
                    'boat_number_2_racer_lap_time' => 36.63,
                    'boat_number_2_racer_turn_time' => 5.37,
                    'boat_number_2_racer_straight_time' => 6.63,
                    'boat_number_3_racer_name' => '福田理',
                    'boat_number_3_racer_exhibition_time' => 6.78,
                    'boat_number_3_racer_lap_time' => 36.92,
                    'boat_number_3_racer_turn_time' => 5.53,
                    'boat_number_3_racer_straight_time' => 6.77,
                    'boat_number_4_racer_name' => '峰重力也',
                    'boat_number_4_racer_exhibition_time' => 6.79,
                    'boat_number_4_racer_lap_time' => 37.38,
                    'boat_number_4_racer_turn_time' => 5.63,
                    'boat_number_4_racer_straight_time' => 6.67,
                    'boat_number_5_racer_name' => '立間充宏',
                    'boat_number_5_racer_exhibition_time' => 6.72,
                    'boat_number_5_racer_lap_time' => 37.50,
                    'boat_number_5_racer_turn_time' => 5.60,
                    'boat_number_5_racer_straight_time' => 6.63,
                    'boat_number_6_racer_name' => '山下昂大',
                    'boat_number_6_racer_exhibition_time' => 6.82,
                    'boat_number_6_racer_lap_time' => 37.70,
                    'boat_number_6_racer_turn_time' => 5.77,
                    'boat_number_6_racer_straight_time' => 6.77,
                ],
            ],
            [
                'arguments' => [11, '2024-01-01'],
                'expected' => [
                    'boat_number_1_racer_name' => '藤原啓史朗',
                    'boat_number_1_racer_exhibition_time' => 6.80,
                    'boat_number_1_racer_lap_time' => 37.10,
                    'boat_number_1_racer_turn_time' => 6.30,
                    'boat_number_1_racer_straight_time' => 6.53,
                    'boat_number_2_racer_name' => '林祐介',
                    'boat_number_2_racer_exhibition_time' => 6.78,
                    'boat_number_2_racer_lap_time' => 37.13,
                    'boat_number_2_racer_turn_time' => 6.13,
                    'boat_number_2_racer_straight_time' => 6.57,
                    'boat_number_3_racer_name' => '岡瀬正人',
                    'boat_number_3_racer_exhibition_time' => 6.83,
                    'boat_number_3_racer_lap_time' => 36.93,
                    'boat_number_3_racer_turn_time' => 5.67,
                    'boat_number_3_racer_straight_time' => 6.83,
                    'boat_number_4_racer_name' => '入海馨',
                    'boat_number_4_racer_exhibition_time' => 6.79,
                    'boat_number_4_racer_lap_time' => 37.20,
                    'boat_number_4_racer_turn_time' => 5.90,
                    'boat_number_4_racer_straight_time' => 6.70,
                    'boat_number_5_racer_name' => '渡邉和将',
                    'boat_number_5_racer_exhibition_time' => 6.77,
                    'boat_number_5_racer_lap_time' => 36.83,
                    'boat_number_5_racer_turn_time' => 5.67,
                    'boat_number_5_racer_straight_time' => 6.87,
                    'boat_number_6_racer_name' => '平尾崇典',
                    'boat_number_6_racer_exhibition_time' => 6.72,
                    'boat_number_6_racer_lap_time' => 37.20,
                    'boat_number_6_racer_turn_time' => 6.13,
                    'boat_number_6_racer_straight_time' => 6.67,
                ],
            ],
        ];
    }
}
