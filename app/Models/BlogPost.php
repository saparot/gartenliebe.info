<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BlogPost extends Model {

    use HasFactory;

    protected $fillable = ['title_de', 'content_de', 'seo_keywords', 'status'];

    public function owner (): BelongsTo {
        return $this->belongsTo(User::class, 'by_user_id');
    }

    public function images (): HasMany {
        return $this->hasMany(BlogPostImage::class);
    }
}
