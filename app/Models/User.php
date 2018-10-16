<?php

namespace App\Models;

use App\Exceptions\AdminNotFound;
use Carbon\Carbon;
use Denismitr\Permissions\Traits\InteractsWithAuthGroups;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
