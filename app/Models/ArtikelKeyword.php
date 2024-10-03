<?php

namespace App\Models;

use App\Models\Artikel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ArtikelKeyword extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function artikel(): BelongsTo
    {
        return $this->belongsTo(Artikel::class);
    }
}
