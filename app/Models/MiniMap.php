<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MiniMap extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'name',
        'image',
        'building',
    ];

    /**
     * Retrieves the question map histories associated with this question.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany The question map histories.
     */
    public function questions()
    {
        return $this->hasMany(Question::class, 'questionId');
    }

    public function user() {
        return $this->hasMany(User::class, 'buildingId');
    }
}
