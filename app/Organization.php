<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $casts = [
        'domain_names' => 'array',
        'tags' => 'array'
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'organization_id', 'id');
    }
}
