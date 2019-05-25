<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Business
 *
 * @property int $id
 * @property string $first_name_ru
 * @property string $first_name_en
 * @property string $last_name_ru
 * @property string $last_name_en
 * @property string|null $about_ru
 * @property string|null $about_en
 * @property string $email
 * @property string $twitter
 * @property string|null $facebook
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Business newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Business newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Business query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Business whereAboutEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Business whereAboutRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Business whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Business whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Business whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Business whereFirstNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Business whereFirstNameRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Business whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Business whereLastNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Business whereLastNameRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Business whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Business whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Business extends Model
{
    protected $guarded = ['id'];

    public function getFirstName(): string
    {
        if (app()->isLocale('ru')) {
            return $this->first_name_ru;
        }

        return $this->first_name_en;
    }

    public function getLastName(): string
    {
        if (app()->isLocale('ru')) {
            return $this->last_name_ru;
        }

        return $this->last_name_en;
    }

    public function getAbout(): string
    {
        if (app()->isLocale('ru')) {
            return $this->about_ru;
        }

        return $this->about_en;
    }
}
