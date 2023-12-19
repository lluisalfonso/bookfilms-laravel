<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'title',
        'rating',
        'has_readen',
        'description'
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
}