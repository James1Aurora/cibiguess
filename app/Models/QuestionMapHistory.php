<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionMapHistory extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = [
        'questionId',
        'historyId',
        'spotImage',
        'answerX',
        'answerY',
        'score',
    ];

    /**
     * Returns a belongsTo relationship between the current model and the Question model,
     * using the foreign key 'questionId'.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(Question::class, 'questionId');
    }

    /**
     * Returns a belongsTo relationship between the current model and the History model,
     * using the foreign key 'historyId'.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function history()
    {
        return $this->belongsTo(History::class, 'historyId');
    }
}