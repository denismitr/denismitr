<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Class Project
 * @package App\Models
 * @property string $picture
 */
class Project extends Model
{
    protected $guarded = ['id'];

    protected $dates = [
        'published_at',
    ];

    public static function boot()
    {
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
    | Actions
    |--------------------------------------------------------------------------
    */

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
