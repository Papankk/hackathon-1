<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Option extends Model
{
    protected $table = 'options';

    protected $fillable = [
        'voting_id',
        'name',
        'description',
        'photo',
    ];

    public function voting(): BelongsTo
    {
        return $this->belongsTo(Voting::class);
    }
}
