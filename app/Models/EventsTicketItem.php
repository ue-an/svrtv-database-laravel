<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $order_no
 * @property string $ticket_id
 * @property string $user_id
 * @property integer $quantity
 * @property Attendee $attendee
 * @property EventsTicket $eventsTicket
 * @property EventsOrder $eventsOrder
 */
class EventsTicketItem extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['order_no', 'ticket_id', 'user_id', 'quantity'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attendee()
    {
        return $this->belongsTo('App\Models\Attendee', 'user_id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function eventsTicket()
    {
        return $this->belongsTo('App\Models\EventsTicket', 'ticket_id', 'ticket_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function eventsOrder()
    {
        return $this->belongsTo('App\Models\EventsOrder', 'order_no', 'order_no');
    }
}
