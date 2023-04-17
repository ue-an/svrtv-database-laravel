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
            $feastappRecords = FeastappRecord::join('attendees', 'feastapp_records.user_id', '=', 'attendees.user_id')->where('attendees.user_id','LIKE',"%$search%")
            ->get(['feastapp_records.feastapp_id', 'attendees.first_name', 'attendees.last_name', 'feastapp_records.date_downloaded']);

            $fphRecords = FeastphRecord::join('attendees', 'feastph_records.user_id', '=', 'attendees.user_id')->where('attendees.user_id', 'LIKE', "%$search%")
            ->get(['feastph_records.feastph_id', 'attendees.first_name', 'attendees.last_name', 'feastph_records.file_name', 'file_download_date']);
        } else {
            $feastappRecords = FeastappRecord::with(['attendee'])->where('user_id','LIKE',"%none%")->get();
            $fphRecords = FeastphRecord::with(['attendee'])->where('user_id', 'LIKE', '%none%')->get();
        }
        

        return view('home.index', compact('feastappRecords','fphRecords'));
    }
}
