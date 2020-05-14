<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $casts = [
        'tags' => 'array'
    ];

    public function organization()
    {
        return $this->hasOne(Organization::class, 'id', 'organization_id');
    }

    public function assignee()
    {
        return $this->hasOne(Member::class, 'id', 'assignee_id');
    }

    public function submitter()
    {
        return $this->hasOne(Member::class, 'id', 'submitter_id');
    }
}
