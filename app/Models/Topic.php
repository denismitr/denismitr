<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Class Topic
 *
 * @package App\Models
 * @property Collection $posts
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Topic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Topic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Topic query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Topic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Topic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Topic whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Topic whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Topic whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Topic extends Model
{
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
