<?php

namespace App\Http\Controllers;

use App\Models\EventsOrder;
use Illuminate\Http\Request;

class EventsOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event_orders = EventsOrder::all();
        return view('event_orders.index', compact('event_orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event_orders.create');
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
            'order_status'=>'required',
            'order_created_date'=>'required',
            'order_completed_date'=>'required',
            'pay_method'=>'required',
        ]);

        $event_order = new EventsOrder();
        $event_order->order_status = $request->order_status;
        $event_order->order_created_date = $request->order_created_date;
        $event_order->order_completed_date = $request->order_completed_date;
        $event_order->pay_method = $request->pay_method;

        $event_order->save();
        return redirect('/event-orders')->with('success', 'event order successfully added');
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
    public function edit(EventsOrder $event_order)
    {
        $event_order = EventsOrder::find($event_order->order_no);
        return view('event_orders.edit', compact('event_order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventsOrder $event_order)
    {
        $event_order = EventsOrder::find($event_order->order_no);
        $event_order->fill($request->all());
        $event_order->save();

        return redirect('/event-orders')->with('success', 'event order successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventsOrder $event_order)
    {
        $event_order->delete();
        return redirect()->back()->with('success', 'event order successfully deleted');
    }
}
