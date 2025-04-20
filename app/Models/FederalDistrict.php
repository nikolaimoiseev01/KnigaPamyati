<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FederalDistrict extends Model
{
    public function company(): HasMany
    {
        return $this->hasMany(Company::class);
    }
}
