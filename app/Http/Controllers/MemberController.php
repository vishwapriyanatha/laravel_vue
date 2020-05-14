<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;

class MemberController extends Controller
{
    private $Member;

    public function __construct(Member $Member)
    {
        $this->Member = $Member;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function search(Request $request)
    {
        $data = $request->all();
        if (!isset($data['search'])) {
            return $this->Member->where('name', 'like', '%' . $data['search'])
                ->orWhere('alias', 'like', '%' . $data['search'])
                ->orWhere('email', 'like', '%' . $data['search'])
                ->with(['tickets', 'tickets.organization'])
                ->get();
        } else {
            return $this->Member
                ->with(['tickets', 'tickets.organization'])
                ->get();
        }

    }
}
