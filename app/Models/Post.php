<?php

namespace App\Models;

use App\Facades\MD;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Class Post
 *
 * @package App\Models
 * @property string $name
 * @property string $slug
 * @property string $body
 * @property Collection $topics
 * @property array $topic_ids
 * @property Carbon $published_at
 * @property int $id
 * @property int|null $parent_id
 * @property int $part
 * @property string $lang
 * @property int $claps
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $human_date
 * @property-read mixed $topic_names
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $parts
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post published()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post recentlyPublished()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post topLevel()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereClaps($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post wherePart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Post extends Model
{
    use Publishable;

    protected $guarded = ['id'];

    protected $appends = ['topic_ids', 'topic_names', 'human_date'];

    protected $dates = ['published_at'];

    protected $with = ['topics', 'parts'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getRouteKey()
    {
        return $this->slug;
    }

    public function getTopicIdsAttribute()
    {
        if ($this->topics->count() === 0) {
            return [];
        }

        return $this->topics->pluck('id')->toArray();
    }

    public function getTopicNamesAttribute()
    {
        if ($this->topics->count() === 0) {
            return '';
        }

        return implode(', ', $this->topics->pluck('name')->toArray());
    }

    public function description(int $limit = 120)
    {
        return str_limit(MD::line($this->body), $limit);
    }

    public function getHumanDateAttribute()
    {
        if (!$this->published_at) {
            return null;
        }

        if (app()->isLocale('ru')) {
            return $this->published_at->toDateString();
        }

        return $this->published_at->toDateString();
    }

    /**
     * @return bool
     */
    public function hasParts(): bool
    {
        return $this->parts->count() > 0;
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    public function scopeTopLevel(Builder $builder)
    {
        return $builder->whereNull('parent_id');
    }

    public function scopePublished(Builder $builder)
    {
        return $builder->whereNotNull('published_at');
    }

    public function scopeRecentlyPublished(Builder $builder)
    {
        return $builder->whereNotNull('published_at')->orderBy('published_at', 'DESC');
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function topics()
    {
        return $this->belongsToMany(Topic::class);
    }

    public function parts()
    {
        return $this->hasMany(Post::class, 'parent_id');
    }
}
