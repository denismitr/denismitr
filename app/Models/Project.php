<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = ['id'];

    protected $dates = [
        'published_at',
    ];

    public function getRouteKey()
    {
        return $this->id;
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
