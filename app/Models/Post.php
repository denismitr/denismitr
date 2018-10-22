<?php

namespace App\Models;

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
 */
class Post extends Model
{
    protected $guarded = ['id'];

    protected $appends = ['topic_ids'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getRouteKey()
    {
        return $this->slug;
    }

    public function publish()
    {
        $this->update([
            'published_at' => now()
        ]);
    }

    public function unpublish()
    {
        $this->update([
            'published_at' => null
        ]);
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
