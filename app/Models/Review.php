<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'userId',
        'rating',
        'comment',
    ];

    /**
     * Retrieves the associated User model for this Review.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo The User model associated with this Review.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }
}