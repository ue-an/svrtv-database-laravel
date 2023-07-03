<?php

namespace App\Http\Controllers;

use App\Models\EventsTicketItem;
use Illuminate\Http\Request;

class EventsTicketItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // EventsTicket::join('events', 'events_tickets.event_id', '=', 'events.event_id')->get();
        $event_ticket_items = EventsTicketItem::join('events_tickets', 'events_ticket_items.ticket_id', '=', 'events_tickets.ticket_id')
        ->join('attendees', 'events_ticket_items.user_id', '=', 'attendees.user_id')->get();
        return view('event_ticket_items.index', compact('event_ticket_items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event_ticket_items.create');
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
            'quantity'=>'required',
        ]);

        $event_ticket_item = new EventsTicketItem();
        $event_ticket_item->quanity = $request->quantity;

        $event_ticket_item->save();
        return redirect('/event-ticket-items')->with('success', 'event ticket item successfully added');
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
    public function edit(EventsTicketItem $event_ticket_item)
    {
        $event_ticket_item = EventsTicketItem::find($event_ticket_item->order_no);
        return view('event_ticket_items.edit', compact('event_ticket_item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventsTicketItem $event_ticket_item)
    {
        $event_ticket_item = EventsTicketItem::find($event_ticket_item->order_no);
        $event_ticket_item->fill($request->all());
        $event_ticket_item->save();

        return redirect('/event-ticket-items')->with('success', 'event ticket item successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventsTicketItem $event_ticket_item)
    {
        $event_ticket_item->delete();
        return redirect()->back()->with('success', 'event ticket item successfully deleted');
    }
}
