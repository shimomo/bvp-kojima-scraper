<?php

declare(strict_types=1);

namespace BVP\KojimaScraper\Tests\Scrapers;

/**
 * @author shimomo
 */
final class CommentScraperDataProvider
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
}
