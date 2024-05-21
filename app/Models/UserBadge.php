<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBadge extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'userId',
        'badgeId',
    ];

    /**
     * Returns the user associated with this UserBadge instance.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo The user relationship.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    /**
     * Get the badge associated with the user badge.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function badge()
    {
        return $this->belongsTo(Badge::class, 'badgeId');
    }
}