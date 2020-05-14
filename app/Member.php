<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $casts = [
        'tags' => 'array'
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'assignee_id', 'id');
    }
}
