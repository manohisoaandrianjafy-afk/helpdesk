<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function getTickets(Request $request)
    {
        return $request->user()->tickets;
    }

    public function deleteTicket(Ticket $ticket)
    {
        return $ticket->delete();
    }

    public function modifierTicket(Ticket $ticket)
    {
        return $ticket->put();
    }
}
