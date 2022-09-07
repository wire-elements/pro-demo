<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Repository extends Model
{
    use HasFactory;

    public function releases(): HasMany
    {
        return $this->hasMany(Release::class)->latest();
    }

    public function issues(): HasMany
    {
        return $this->hasMany(Issue::class)->latest();
    }
}
