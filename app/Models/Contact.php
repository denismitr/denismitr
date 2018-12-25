<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = ['id'];

    public function markAsSent()
    {
        $this->update(['sent' => true]);
    }
}
