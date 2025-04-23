<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Veteran extends Model implements HasMedia
{
    use InteractsWithMedia;
    use Searchable;

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function toSearchableArray(): array
    {
        return array_merge($this->toArray(),[
            'name' => $this->name,
            'surname' => $this->surname,
            'thirdname' => $this->thirdname,
        ]);
    }

    protected $casts = [
        'timeline' => 'array'
    ];
}
