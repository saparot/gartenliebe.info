<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\BlogPostImage
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $filename
 * @property int $blog_post_id
 * @property-read \App\Models\BlogPost|null $listing
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPostImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPostImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPostImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPostImage whereBlogPostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPostImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPostImage whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPostImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPostImage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BlogPostImage extends Model {

    use HasFactory;

    protected $fillable = ['filename'];

    public function listing (): BelongsTo {
        return $this->belongsTo(BlogPost::class);
    }
}
