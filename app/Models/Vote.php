<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vote extends Model
{
    protected $table = 'votes';

    protected $fillable = [
        'user_id',
        'voting_id',
        'option_id',
    ];

    public function voting(): HasMany
    {
        return $this->hasMany(Voting::class);
    }

    public function option(): HasMany
    {
        return $this->hasMany(Option::class);
    }
}
