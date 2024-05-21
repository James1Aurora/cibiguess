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
        Badge::create([
            'title' => 'Mosque Master',
            'description' => 'Here\'s the description about this badge',
            'image' => 'masjid.png',
        ]);

        Badge::create([
            'title' => 'Mosque Master II',
            'description' => 'Here\'s the description about this badge',
            'image' => 'masjid.png',
        ]);
    }
}
