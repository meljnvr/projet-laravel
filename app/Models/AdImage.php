<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdImage extends Model
{
    use HasFactory;

    protected $table = 'ad_images';
    protected $fillable = ['ad_id', 'file_path'];
    public $timestamps = false;
    

    public function ad(): BelongsTo
    {
        return $this->belongsTo(Ad::class);
    }
}
