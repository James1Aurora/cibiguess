<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'difficulty',
        'building',
        'spotImage',
        'mapImage',
        'answerX',
        'answerY',
    ];

    /**
     * Retrieves the question map histories associated with this question.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany The question map histories.
     */
    public function questionMapHistories()
    {
        return $this->hasMany(QuestionMapHistory::class, 'questionId');
    }
}
