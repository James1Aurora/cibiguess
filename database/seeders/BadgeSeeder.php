<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Badge;

class BadgeSeeder extends Seeder
{
    /**
     * Run the database seeder.
     *
     * This function creates two badge records in the database. The first badge has a title of 'Mosque Master', a description of 'Here\'s the description about this badge', and an image of 'masjid.png'. The second badge has a title of 'Mosque Master II', a description of 'Here\'s the description about this badge', and an image of 'masjid.png'.
     *
     * @return void
     */
    public function run()
    {
        $badges = [
            [
                'title' => 'Max Score',
                'criteria' => 'score',
                'threshold' => 3000,
                'description' => 'Achieve a total score of 3000 across all maps.'
            ],
            [
                'title' => 'Intermediate Plays',
                'criteria' => 'score',
                'threshold' => 1500,
                'description' => 'Achieve a total score of 1500 across all maps.'
            ],
            [
                'title' => 'First Play',
                'criteria' => 'completed_maps',
                'threshold' => 1,
                'description' => 'Complete your first map.'
            ],
            [
                'title' => 'Complete 10 Maps',
                'criteria' => 'completed_maps',
                'threshold' => 10,
                'description' => 'Complete more than 10 maps.'
            ],
            [
                'title' => 'Complete 20 Maps',
                'criteria' => 'completed_maps',
                'threshold' => 20,
                'description' => 'Complete more than 20 maps.'
            ],
            [
                'title' => 'Complete 30 Maps',
                'criteria' => 'completed_maps',
                'threshold' => 30,
                'description' => 'Complete more than 30 maps.'
            ],
            [
                'title' => 'Play Easy Mode',
                'criteria' => 'difficulty',
                'threshold' => 'easy',
                'description' => 'Play in easy mode.'
            ],
            [
                'title' => 'Play Medium Mode',
                'criteria' => 'difficulty',
                'threshold' => 'medium',
                'description' => 'Play in medium mode.'
            ],
            [
                'title' => 'Play Hard Mode',
                'criteria' => 'difficulty',
                'threshold' => 'hard',
                'description' => 'Play in hard mode.'
            ],
            [
                'title' => 'Play in Masjid',
                'criteria' => 'location',
                'threshold' => 'masjid',
                'description' => 'Play a map set in the Masjid location.'
            ],
            [
                'title' => 'Play in Lapangan',
                'criteria' => 'location',
                'threshold' => 'lapangan',
                'description' => 'Play a map set in the Lapangan location.'
            ],
            [
                'title' => 'Play in Asrama',
                'criteria' => 'location',
                'threshold' => 'asrama',
                'description' => 'Play a map set in the Asrama location.'
            ],
            [
                'title' => 'Play in Random',
                'criteria' => 'location',
                'threshold' => 'random',
                'description' => 'Play a map set in a random location.'
            ],
        ];

        foreach ($badges as $badge) {
            Badge::create($badge);
        }
    }
}