<?php

declare(strict_types=1);

namespace BVP\KojimaScraper\Tests\Scrapers;

/**
 * @author shimomo
 */
final class TimeScraperDataProvider
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
