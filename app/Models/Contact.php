<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Contact
 *
 * @property int $id
 * @property string $ip
 * @property string $hash
 * @property string $name
 * @property string $body
 * @property string $email
 * @property int $sent
 * @property int $spam
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereSent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereSpam($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $status
 * @property int $is_spam
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereIsSpam($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereStatus($value)
 */
class Contact extends Model
{
    const STATUS_PENDING = 'pending';
    const STATUS_SENDING = 'sending';
    const STATUS_SENT = 'sent';

    protected $guarded = ['id'];

    public function markAsSent()
    {
        $this->update(['sent' => true]);
    }

    public function isSpam(): bool
    {
        return !! $this->is_spam;
    }
}
