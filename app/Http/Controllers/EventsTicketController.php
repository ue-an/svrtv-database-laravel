<?php

namespace App\Http\Controllers;

use App\Models\EventsTicket;
use Illuminate\Http\Request;

class EventsTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // join('attendees', 'feastbook_transactions.user_id', '=', 'attendees.user_id')->where('attendees.user_id', 'LIKE', "%$search%")
        //     ->orwhere('attendees.first_name','LIKE', "%$search%")
        //     ->orwhere('attendees.last_name','LIKE', "%$search%")
        //     ->get(['feastbook_transactions.feastbook_id', 'attendees.first_name', 'attendees.last_name', 'feastbook_transactions.order_id', 'feastbook_transactions.product_id', 'feastbook_transactions.quantity'])
        $event_tickets = EventsTicket::join('events', 'events_tickets.event_id', '=', 'events.event_id')->get();
        return view('event_tickets.index', compact('event_tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event_tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_name'=>'required',
            'ticket_type'=>'required',
            'ticket_name'=>'required',
            'ticket_cost'=>'required',
        ]);
        $event_ticket = new EventsTicket();
        $event_ticket->event_name = $request->event_name;
        $event_ticket->ticket_type = $request->ticket_type;
        $event_ticket->ticket_name = $request->ticket_name;
        $event_ticket->ticket_cost = $request->ticket_cost;

        $event_ticket->save();
        return redirect('/event-tickets')->with('success', 'event ticket successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EventsTicket $event_ticket)
    {
        $event_ticket = EventsTicket::find($event_ticket->event_id);
        return view('event_tickets.edit', compact('event_ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventsTicket $event_ticket)
    {
        $event_ticket = EventsTicket::find($event_ticket->event_id);
        $event_ticket->fill($request->all());
        $event_ticket->save();

        return redirect('/event-tickets')->with('success', 'event ticket successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventsTicket $event_ticket)
    {
        $event_ticket->delete();
        return redirect()->back()->with('success', 'event ticket successfully deleted');
    }
}
