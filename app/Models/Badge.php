<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'title',
        'description',
        'image',
        'threshold',
        'criteria',
    ];

    /**
     * Retrieves the user badges associated with this model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userBadges()
    {
        return $this->hasMany(UserBadge::class, 'badgeId');
    }
}