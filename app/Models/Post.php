<?php

namespace App\Models;

use Carbon\Carbon;
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
 */
class Post extends Model
{
    use Publishable;

    protected $guarded = ['id'];

    protected $appends = ['topic_ids'];

    protected $dates = ['published_at'];

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function topics()
    {
        return $this->belongsToMany(Topic::class);
    }
}
