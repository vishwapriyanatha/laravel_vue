<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;

class TicketController extends Controller
{
    private $ticket;

    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    public function search(Request $request)
    {
        $data = $request->all();
        if (!isset($data['search'])) {
            return $this->ticket->where('subject', 'like', '%' . $data['search'] . '%')
                ->orWhere('description', 'like', '%' . $data['search'])
                ->orWhere('type', 'like', '%' . $data['search'])
                ->orWhere('priority', 'like', '%' . $data['search'])
                ->orWhere('status', 'like', '%' . $data['search'])
                ->with(['organization', 'assignee', 'submitter'])
                ->get();
        } else {
            return $this->ticket
                ->with(['organization', 'assignee', 'submitter'])
                ->get();
        }
    }
}
