<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $fillable = [
        'avatar', 'firstName', 'lastName', 'address',
        'city', 'zip', 'country', 'email', 'phone', 'note',
        'group_id'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

}
