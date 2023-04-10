<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\BlogPost
 *
 * @property int $id
 * @property string $title_de
 * @property string $content_de
 * @property string $seo_keywords
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BlogPostImage[] $images
 * @property-read int|null $images_count
 * @property-read \App\Models\User|null $owner
 * @method static \Database\Factories\BlogPostFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost query()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost whereContentDe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost whereSeoKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost whereTitleDe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BlogPost extends Model {

    use HasFactory;

    protected $fillable = ['title_de', 'content_de', 'seo_keywords', 'status'];

    /**
     * @return BelongsTo<User, BlogPost>
     */
    public function owner (): BelongsTo {
        return $this->belongsTo(User::class, 'by_user_id');
    }

    /**
     * @return HasMany<BlogPostImage>
     */
    public function images (): HasMany {
        return $this->hasMany(BlogPostImage::class);
    }
}
