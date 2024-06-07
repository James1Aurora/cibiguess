<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'userId',
        'buildingId',
        'difficulty',
        'datePlayed',
        'score',
    ];

    /**
     * Get the user that owns the history.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    /**
     * Retrieves the question map histories associated with this history.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany The question map histories.
     */
    public function questionMapHistories()
    {
        return $this->hasMany(QuestionMapHistory::class, 'historyId');
    }

    /**
     * Get the user that owns the history.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function miniMap()
    {
        return $this->belongsTo(MiniMap::class, 'buildingId');
    }
}