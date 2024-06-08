<?php
namespace App\Services;

use App\Models\Badge;
use App\Models\UserBadge;

class BadgeService
{
    public function checkAndAwardBadges($user, $totalScore, $totalMap)
    {
        $badges = Badge::all();
        foreach ($badges as $badge) {
            switch ($badge->criteria) {
                case 'score':
                    if ($totalScore >= $badge->threshold) {
                        $this->awardBadge($user, $badge);
                    }
                    break;
                case 'completed_maps':
                    if ($totalMap >= $badge->threshold) {
                        $this->awardBadge($user, $badge);
                    }
                    break;
                case 'first_map':
                    if ($totalMap >= $badge->threshold && !$this->hasBadge($user, $badge->id)) {
                        $this->awardBadge($user, $badge);
                    }
                    break;
                // Tambahkan case lain sesuai dengan criteria badge
            }
        }
    }

    protected function awardBadge($user, $badge)
    {
        UserBadge::create([
            'user_id' => $user->id,
            'badge_id' => $badge->id,
        ]);
    }

    protected function hasBadge($user, $badgeId)
    {
        return UserBadge::where('user_id', $user->id)
            ->where('badge_id', $badgeId)
            ->exists();
    }
}