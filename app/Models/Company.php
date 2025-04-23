<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Company extends Model implements HasMedia
{
    use InteractsWithMedia;
    public function federal_district(): BelongsTo
    {
        return $this->belongsTo(FederalDistrict::class);
    }

    public function veteran(): HasMany
    {
        return $this->hasMany(Veteran::class);
    }

    protected $casts = [
        'timeline' => 'array'
    ];
}
