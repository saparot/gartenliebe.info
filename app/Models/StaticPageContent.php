<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\StaticPageContent
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $identifier
 * @property string $content
 * @method static \Database\Factories\StaticPageContentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|StaticPageContent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StaticPageContent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StaticPageContent query()
 * @method static \Illuminate\Database\Eloquent\Builder|StaticPageContent whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaticPageContent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaticPageContent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaticPageContent whereIdentifier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaticPageContent whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class StaticPageContent extends Model {

    use HasFactory;
}
