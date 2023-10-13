<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category',
        'price',
        'author_id',
        'place',
        'image',
        'state',
        'brand',
        'year',
        'dimensions',
        'expiration_date',
        'delivery',
        'garanties',
        'open_to_discussion'
    ];

    protected $with = [
        'author',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
