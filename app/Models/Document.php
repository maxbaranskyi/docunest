<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Document extends Model
{
    /** @use HasFactory<\Database\Factories\DocumentFactory> */
    use HasFactory;

    public function team(): BelongsTo 
    {
        return $this->belongsTo(Team::class);
    }

    public function versions(): HasMany
    {
        return $this->hasMany(Version::class);
    }

    public function currentVersion() 
    {
        return $this->versions()->one()->latestOfMany();
    }
}
