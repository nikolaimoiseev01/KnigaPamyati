<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Veteran extends Model implements HasMedia
{
    use InteractsWithMedia;

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
