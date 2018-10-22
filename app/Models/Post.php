<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 *
 * @package App\Models
 * @property string $name
 * @property string $slug
 * @property string $body
 */
class Post extends Model
{
    protected $guarded = ['id'];

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function topics()
    {
        return $this->belongsToMany(Topic::class);
    }
}
