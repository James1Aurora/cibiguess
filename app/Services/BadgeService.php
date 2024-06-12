<?php
namespace App\Services;

use App\Models\Badge;
use App\Models\UserBadge;

class BadgeService
{
    public function checkAndAwardBadges($user, $totalScore, $totalMap, $building, $difficulty)
    {
        $badges = Badge::all();
        $userBadges = $user->userBadges;
        $awardedBadges = [];

        foreach ($badges as $badge) {
            switch ($badge->criteria) {
                case 'score':
                    if ($totalScore >= $badge->threshold && !$this->hasBadge($user, $badge->id)) {
                        $this->awardBadge($user, $badge);
                        $awardedBadges[] = $badge;
                    }
                    break;
                case 'completed_maps':
                    if ($userBadges->count() + $totalMap >= 30 && $badge->threshold === 30 && !$this->hasBadge($user, $badge->id)) {
                        $this->awardBadge($user, $badge, 'complete_30_maps');
                        $awardedBadges[] = $badge;
                    } elseif ($userBadges->count() + $totalMap >= 20 && $badge->threshold === 20 && !$this->hasBadge($user, $badge->id)) {
                        $this->awardBadge($user, $badge, 'complete_20_maps');
                        $awardedBadges[] = $badge;
                    } elseif ($userBadges->count() + $totalMap >= 10 && $badge->threshold === 10 && !$this->hasBadge($user, $badge->id)) {
                        $this->awardBadge($user, $badge, 'complete_10_maps');
                        $awardedBadges[] = $badge;
                    } elseif ($userBadges->count() + $totalMap >= 1 && $badge->threshold === 1 && !$this->hasBadge($user, $badge->id)) {
                        $this->awardBadge($user, $badge, 'first_play');
                        $awardedBadges[] = $badge;
                    }
                    break;
                case 'difficulty':
                    if ($difficulty === 'easy' && $badge->threshold === 'easy' && !$this->hasBadge($user, $badge->id)) {
                        $this->awardBadge($user, $badge, 'play_easy_mode');
                        $awardedBadges[] = $badge;
                    } elseif ($difficulty === 'medium' && $badge->threshold === 'medium' && !$this->hasBadge($user, $badge->id)) {
                        $this->awardBadge($user, $badge, 'play_medium_mode');
                        $awardedBadges[] = $badge;
                    } elseif ($difficulty === 'hard' && $badge->threshold === 'hard' && !$this->hasBadge($user, $badge->id)) {
                        $this->awardBadge($user, $badge, 'play_hard_mode');
                        $awardedBadges[] = $badge;
                    }
                    break;
                case 'location':
                    if ($building === 'masjid' && $badge->threshold === 'masjid' && !$this->hasBadge($user, $badge->id)) {
                        $this->awardBadge($user, $badge, 'play_in_masjid');
                        $awardedBadges[] = $badge;
                    } elseif ($building === 'lapangan' && $badge->threshold === 'lapangan' && !$this->hasBadge($user, $badge->id)) {
                        $this->awardBadge($user, $badge, 'play_in_lapangan');
                        $awardedBadges[] = $badge;
                    } elseif ($building === 'asrama' && $badge->threshold === 'asrama' && !$this->hasBadge($user, $badge->id)) {
                        $this->awardBadge($user, $badge, 'play_in_asrama');
                        $awardedBadges[] = $badge;
                    } elseif ($building === 'random' && $badge->threshold === 'random' && !$this->hasBadge($user, $badge->id)) {
                        $this->awardBadge($user, $badge, 'play_in_random');
                        $awardedBadges[] = $badge;
                    }
                    break;
            }
        }

        return $awardedBadges;
    }

    protected function awardBadge($user, $badge)
    {
        UserBadge::create([
            'userId' => $user->id,
            'badgeId' => $badge->id,
        ]);
    }

    protected function hasBadge($user, $badgeId)
    {
        return UserBadge::where('userId', $user->id)
            ->where('badgeId', $badgeId)
            ->exists();
    }
}