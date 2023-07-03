<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use App\Models\EventsTicketItem;
use App\Models\FeastappRecord;
use App\Models\FeastbookTransaction;
use App\Models\FeastmediaRecord;
use App\Models\FeastmercyministryRecord;
use App\Models\FeastphRecord;
use App\Models\HolyweekretreatRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class AttendeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $attendees=Attendee::all()->where("is_bonafied", "=", "0");

        $chk_attendees = [];
        $chk_feastapp = $request->chk_feastapp;
        $chk_feastbook = $request->chk_feastbook;
        $chk_feastmedia = $request->chk_feastmedia;
        $chk_fmm = $request->chk_fmm;
        $chk_feastph = $request->chk_feastph;
        $chk_hwr = $request->chk_hwr;
        $chk_events_ticket = $request->chk_events_ticket;

        $all_count = Attendee::all();
        $deliverables = Attendee::all()->where("is_bonafied", "=", "0");
        $unique_emails = count($deliverables);
        
        if ($request->chk_feastapp == "on") {
            $feastapp_uid = FeastappRecord::all(['user_id']);
            foreach ($feastapp_uid as $fuid) {
                array_push($chk_attendees, $fuid);
            }
        }

        if ($request->chk_feastbook == "on") {
            $fb_uid = FeastbookTransaction::all(['user_id']);
            foreach ($fb_uid as $fuid) {
                array_push($chk_attendees, $fuid);
            }
        }

        if ($request->chk_feastmedia == "on") {
            $fmed_uid = FeastmediaRecord::all(['user_id']);
            foreach ($fmed_uid as $fuid) {
                array_push($chk_attendees, $fuid);
            }
        }

        if ($request->chk_fmm == "on") {
            $fmm_uid = FeastmercyministryRecord::all(['user_id']);
            foreach ($fmm_uid as $fuid) {
                array_push($chk_attendees, $fuid);
            }
        }

        if ($request->chk_fph == "on") {
            $fph_uid = FeastphRecord::all(['user_id']);
            foreach ($fph_uid as $fuid) {
                array_push($chk_attendees, $fuid);
            }
        }

        if ($request->chk_hwr == "on") {
            $hwr_uid = HolyweekretreatRecord::all(['user_id']);
            foreach ($hwr_uid as $fuid) {
                array_push($chk_attendees, $fuid);
            }
        }

        if ($request->chk_events_ticket == "on") {
            $evti_uid = EventsTicketItem::all(['user_id']);
            foreach ($evti_uid as $fuid) {
                array_push($chk_attendees, $fuid);
            }
        }

        return view('attendees.index', compact('attendees', 'chk_attendees', 'chk_feastapp', 'chk_feastbook', 'chk_feastmedia', 'chk_fmm', 'chk_feastph', 'chk_hwr', 'chk_events_ticket', 'unique_emails', 'all_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('attendees.create');
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
            'email'=>'required',
            'last_name'=>'required',
            'first_name'=>'required',
            'is_bonafied'=>'required',
        ]);
        $attendee = new Attendee();
        $attendee->user_id = "att-".Str::ranPdom(13);
        $attendee->email = $request->email;
        $attendee->last_name = $request->last_name;
        $attendee->first_name = $request->first_name;
        $attendee->mobile_no = $request->mobile_no;
        $attendee->is_bonafied = $request->is_bonafied=="TRUE"?0:1;
        $attendee->is_feast_attendee = $request->is_feast_attendee=="TRUE"?0:1;
        $attendee->feast_name = $request->feast_name;
        $attendee->feast_district = $request->feast_district;
        $attendee->address = $request->address;
        $attendee->city = $request->city;
        $attendee->country = $request->country;

        $attendee->save();
        return redirect('/attendees')->with('success', 'attendee successfully added');
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
     * @param  \App\Models\Attendee  $attendee
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendee $attendee)
    {
        $attendee = Attendee::find($attendee->user_id);
        return view('attendees.edit', compact('attendee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendee  $attendee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendee $attendee)
    {
        $attendee = Attendee::find($attendee->user_id);
        $attendee->fill($request->all());
        $attendee->save();

        return redirect('/attendees')->with('success', 'attendee successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendee $attendee)
    {
        $attendee->delete();
        return redirect()->back()->with('success', 'attendee successfully deleted');
    }
}
