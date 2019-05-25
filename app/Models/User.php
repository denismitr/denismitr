<?php

namespace App\Models;

use App\Exceptions\AdminNotFound;
use Carbon\Carbon;
use Denismitr\Permissions\Traits\InteractsWithAuthGroups;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $current_auth_group_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\Denismitr\Permissions\Models\AuthGroupUser[] $authGroupUsers
 * @property-read \Illuminate\Database\Eloquent\Collection|\Denismitr\Permissions\Models\AuthGroup[] $authGroups
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\Denismitr\Permissions\Models\AuthGroup[] $ownedAuthGroups
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User allowed($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User inAuthGroups($groups)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCurrentAuthGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User withPermissions($permissions)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable, InteractsWithAuthGroups;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @param string $email
     * @return User
     * @throws AdminNotFound
     */
    public static function getAdmin(string $email): self
    {
        /** @var User $user */
        if ( ! $user = static::where('email', $email)->first()) {
            throw AdminNotFound::noMatchingEmail($email);
        }

        if ( ! $user->isOneOf('admins') ) {
            throw AdminNotFound::doesNotBelongToAdminGroup($email);
        }

        return $user;
    }

    public function justLoggedIn(): void
    {
        $this->update([
            'last_logged_in' => Carbon::now(),
        ]);
    }

    /**
     * @param string $password
     */
    public function setNewPassword(string $password): void
    {
        $this->password = bcrypt($password);
        $this->save();
    }
}
