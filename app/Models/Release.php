<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Release extends Model
{
    use HasFactory;

    public function repository(): BelongsTo
    {
        return $this->belongsTo(Repository::class);
    }

    public function assets(): HasMany
    {
        return $this->hasMany(Asset::class)->latest();
    }
}
