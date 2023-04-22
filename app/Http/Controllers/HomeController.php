<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use Illuminate\Http\Request;
use App\Models\FeastappRecord;
use App\Models\FeastmediaRecord;
use App\Models\FeastmercyministryRecord;
use App\Models\EventsTicketItem;
use App\Models\FeastbookTransaction;
use App\Models\FeastphRecord;
use App\Models\HolyweekretreatRecord;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // $feastappRecords=FeastappRecord::all();
        // $fphRecords=FeastphRecord::all();
        // $fmediaRecords=FeastmediaRecord::all();
        // $fmmRecords=FeastmercyministryRecord::all();
        // $ticketRecords=EventsTicketItem::all();
        // $fbtransactions=FeastbookTransaction::all();
        // $hwrRecords=HolyweekretreatRecord::all();
        // return view('home.index', compact('ticketRecords', 'feastappRecords', 'fphRecords', 'fmediaRecords', 'fmmRecords', 'ticketRecords', 'fbtransactions', 'hwrRecords'));
        
        //-------search
        $search = $request->search;

        if ($search != null) {
            $records_userID = Attendee::where('user_id', 'LIKE', "%$search%")->orwhere('first_name', 'LIKE', "%$search%")->orwhere('last_name', 'LIKE', "%$search%")->first();

            $feastappRecords = FeastappRecord::join('attendees', 'feastapp_records.user_id', '=', 'attendees.user_id')->where('attendees.user_id','LIKE',"%$search%")
            ->orwhere('attendees.first_name','LIKE', "%$search%")
            ->orwhere('attendees.last_name','LIKE', "%$search%")
            ->get(['feastapp_records.feastapp_id', 'attendees.first_name', 'attendees.last_name', 'feastapp_records.date_downloaded']);

            $fphRecords = FeastphRecord::join('attendees', 'feastph_records.user_id', '=', 'attendees.user_id')->where('attendees.user_id', 'LIKE', "%$search%")
            ->orwhere('attendees.first_name','LIKE', "%$search%")
            ->orwhere('attendees.last_name','LIKE', "%$search%")
            ->get(['feastph_records.feastph_id', 'attendees.first_name', 'attendees.last_name', 'feastph_records.file_name', 'file_download_date']);
            
            $fmediaRecords = FeastmediaRecord::join('attendees', 'feastmedia_records.user_id', '=', 'attendees.user_id')->where('attendees.user_id', 'LIKE', "%$search%")
            ->orwhere('attendees.first_name','LIKE', "%$search%")
            ->orwhere('attendees.last_name','LIKE', "%$search%")
            ->get(['feastmedia_records.feast_media_event_id', 'attendees.first_name', 'attendees.last_name', 'feastmedia_records.event_name', 'feastmedia_records.ticket_type', 'feastmedia_records.event_type', 'feastmedia_records.event_date', 'feastmedia_records.ticket_cost']);

            $fmmRecords = FeastmercyministryRecord::join('attendees', 'feastmercyministry_records.user_id', '=', 'attendees.user_id')->where('attendees.user_id', 'LIKE', "%$search%")
            ->orwhere('attendees.first_name','LIKE', "%$search%")
            ->orwhere('attendees.last_name','LIKE', "%$search%")
            ->get(['feastmercyministry_records.fmm_id', 'attendees.first_name', 'attendees.last_name', 'feastmercyministry_records.donor_type', 'feastmercyministry_records.donation_start_date', 'feastmercyministry_records.donation_end_date', 'feastmercyministry_records.amount', 'feastmercyministry_records.pay_method']);

            $ticketRecords = EventsTicketItem::join('attendees', 'events_ticket_items.user_id', '=', 'attendees.user_id')->where('attendees.user_id', 'LIKE', "%$search%")
            ->orwhere('attendees.first_name','LIKE', "%$search%")
            ->orwhere('attendees.last_name','LIKE', "%$search%")
            ->get(['events_ticket_items.order_no', 'events_ticket_items.ticket_id', 'attendees.first_name', 'attendees.last_name', 'events_ticket_items.quantity']);

            $fbtransactions = FeastbookTransaction::join('attendees', 'feastbook_transactions.user_id', '=', 'attendees.user_id')->where('attendees.user_id', 'LIKE', "%$search%")
            ->orwhere('attendees.first_name','LIKE', "%$search%")
            ->orwhere('attendees.last_name','LIKE', "%$search%")
            ->get(['feastbook_transactions.feastbook_id', 'attendees.first_name', 'attendees.last_name', 'feastbook_transactions.order_id', 'feastbook_transactions.product_id', 'feastbook_transactions.quantity']);

            $hwrRecords = HolyweekretreatRecord::join('attendees', 'holyweekretreat_records.user_id', '=', 'attendees.user_id')->where('attendees.user_id', 'LIKE', "%$search%")
            ->orwhere('attendees.first_name','LIKE', "%$search%")
            ->orwhere('attendees.last_name','LIKE', "%$search%")
            ->get(['holyweekretreat_records.hwr_id', 'attendees.first_name', 'attendees.last_name', 'holyweekretreat_records.event_date']);
        } else {
            $feastappRecords = FeastappRecord::with(['attendee'])->where('user_id','LIKE',"%none%")->get();
            $fphRecords = FeastphRecord::with(['attendee'])->where('user_id', 'LIKE', '%none%')->get();
            $fmediaRecords = FeastmediaRecord::with(['attendee'])->where('user_id', 'LIKE', "%none%")->get();
            $fmmRecords = FeastmercyministryRecord::with(['attendee'])->where('user_id', 'LIKE', "%none%")->get();
            $ticketRecords = EventsTicketItem::with(['attendee'])->where('user_id', 'LIKE', "%none%")->get();
            $fbtransactions = FeastbookTransaction::with(['attendee'])->where('user_id', 'LIKE', "%none%")->get();
            $hwrRecords = HolyweekretreatRecord::with(['attendee'])->where('user_id', 'LIKE', "%none%")->get();
            $records_userID = Attendee::where('first_name', 'LIKE', "%none%")->orwhere('last_name', 'LIKE', "%none%")->get();
        }
        

        return view('home.index', compact('feastappRecords','fphRecords', 'records_userID', 'fmediaRecords', 'fmmRecords', 'ticketRecords', 'fbtransactions', 'hwrRecords'));
    }
}
