<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Voting extends Model
{
    protected $table = 'votings';

    protected $fillable = [
        'title',
        'description',
        'start_time',
        'end_time',
        'is_public',
    ];

    public function options(): HasMany
    {
        return $this->hasMany(Option::class);
    }

    public function votes(): BelongsTo
    {
        return $this->belongsTo(Vote::class);
    }
}
