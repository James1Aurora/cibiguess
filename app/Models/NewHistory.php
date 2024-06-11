<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewHistory extends Model
{
    use HasFactory;

    protected $table = 'new_histories';

    protected $fillable = [
        'userId',
        'buildingId',
        'difficulty',
        'datePlayed',
        'score',
    ];


}
