<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use App\Models\Event;
use App\Models\EventsOrder;
use App\Models\EventsTicket;
use App\Models\EventsTicketItem;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = EventsTicketItem::
        // join('attendees', 'events_ticket_items.user_id', '=', 'attendees.user_id')->get();
        join('events_tickets', 'events_ticket_items.ticket_id', '=', 'events_tickets.ticket_id')
        ->join('events', 'events_tickets.event_id', '=', 'events.event_id')
        ->join('events_orders', 'events_ticket_items.order_no', '=', 'events_orders.order_no')
        ->join('attendees', 'events_ticket_items.user_id', '=', 'attendees.user_id')->get();

        $users = Attendee::all();

        $event_emails = [];

        $event_uids = EventsTicketItem::join('attendees', 'events_ticket_items.user_id', '=', 'attendees.user_id')->get();
        foreach ($event_uids as $uid) {
            if (in_array($uid->email, $event_emails)) {
                
            } else {
                array_push($event_emails, $uid->email);
            }
            
        }

        foreach ($users as $user) {
            $uid =  $user->user_id;
            $total_transactions = EventsTicketItem::join('events_tickets', 'events_ticket_items.ticket_id', '=', 'events_tickets.ticket_id')
            ->join('events', 'events_tickets.event_id', '=', 'events.event_id')
            ->join('events_orders', 'events_ticket_items.order_no', '=', 'events_orders.order_no')
            ->join('attendees', 'events_ticket_items.user_id', '=', 'attendees.user_id')->get();
            // ->where('events_ticket_items.user_id', '=', $uid)->get();
        }

        
        // Event::all();
        return view('events.index', compact('events', 'total_transactions', 'event_emails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
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
            'event_type'=>'required',
        ]);

        $event = new Event();
        $event->event_name = $request->event_name;
        $event->event_type = $request->event_type;
        $event->save();
        return redirect('/events')->with('success', 'event data successfully added');
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
    public function edit(Event $event)
    {
        $event = Event::find($event->event_id);
        $event_ord = EventsOrder::find($event->order_no);
        $event_tck = EventsTicket::find($event->ticket_id);
        // $event = EventsTicket::join('events_tickets', 'events_ticket_items.ticket_id', '=', 'events_tickets.ticket_id')
        // ->join('events', 'events_tickets.event_id', '=', 'events.event_id')
        // ->join('events_orders', 'events_ticket_items.order_no', '=', 'events_orders.order_no')
        // ->join('attendees', 'events_ticket_items.user_id', '=', 'attendees.user_id')->where('events.event_id','=', $event->event_id);
        return view('events.edit', compact('event','event_ord','event_tck'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $event = Event::find($event->event_id);
        $event->fill($request->all());
        $event->save();

        return redirect('/events')->with('success', 'event data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->back()->with('success', 'event data successfully deleted');
    }
}
