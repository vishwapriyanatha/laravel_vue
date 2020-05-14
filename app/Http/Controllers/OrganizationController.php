<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;

class OrganizationController extends Controller
{
    private $organization;

    public function __construct(Organization $organization)
    {
        $this->organization = $organization;
    }

    public function search(Request $request)
    {
        $data = $request->all();
        if (!isset($data['search'])) {
            return $this->organization->where('name', 'like', '%' . $data['search'])
                ->orWhere('details', 'like', '%' . $data['search'])
                ->with(['tickets', 'tickets.assignee'])
                ->get();
        } else {
            return $this->organization
                ->with(['tickets', 'tickets.assignee'])
                ->get();
        }
    }
}
