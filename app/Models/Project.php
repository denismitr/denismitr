<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Class Project
 *
 * @package App\Models
 * @property string $picture
 * @property string $slug
 * @property string $disk
 * @property int $id
 * @property int|null $customer_id
 * @property string $name
 * @property string|null $url
 * @property string|null $description_en
 * @property string|null $description_ru
 * @property \Illuminate\Support\Carbon|null $published_at
 * @property string $color
 * @property int $priority
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Customer|null $customer
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project important()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project published()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereDescriptionEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereDescriptionRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereDisk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project wherePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereUrl($value)
 * @mixin \Eloquent
 */
class Project extends Model
{
    use Publishable;

    protected $guarded = ['id'];

    protected $dates = [
        'published_at',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function($project) {
            $project->slug = str_slug($project->name);
        });

        static::deleted(function($project) {
            if (!empty($project->picture)) {
                Storage::disk($project->disk)->delete($project->picture);
            }
        });
    }

    public function getRouteKey()
    {
        return $this->slug;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getPicture()
    {
        if ($this->hasExternalPicture()) {
            return $this->picture;
        }

        return asset('storage/'.$this->picture);
    }

    /**
     * @return bool
     */
    public function hasExternalPicture(): bool
    {
        return Str::contains($this->picture, ['http://', 'https://']);
    }


    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    public function scopePublished(Builder $builder)
    {
        return $builder->where('published_at', '<', now());
    }

    public function scopeImportant(Builder $builder)
    {
        return $builder->orderBy('priority', 'DESC');
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
