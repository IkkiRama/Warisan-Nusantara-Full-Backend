<?php

namespace App\Models;

use App\Models\KategoriEvent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];

    public function kategoriEvent(): BelongsTo
    {
        return $this->belongsTo(KategoriEvent::class);
    }
}
