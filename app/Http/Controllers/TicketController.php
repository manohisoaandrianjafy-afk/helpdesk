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

    public function creationTicket(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'statut' => 'required|string|max:255',
            'priorite' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',

        ]);
        $ticket = Ticket::create(
            [
                'nom' => $request->nom,
                'description' => $request->description,
                'statut' => $request->statut,
                'priorite' => $request->priorite,
                'user_id' => $request->user()->id,
                'category_id' =>$request->category_id,                                               
                'agent_id' => null
            ]
        );
        return response()->json([
            'ticket' => $ticket
        ]);
    }
    public function deleteTicket(Ticket $ticket)
    {
        return $ticket->delete();
    }

    public function modifierTicket(Ticket $ticket)
    {
        
    }

}
