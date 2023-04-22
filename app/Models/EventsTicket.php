<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $ticket_id
 * @property string $event_id
 * @property string $ticket_type
 * @property string $ticket_name
 * @property float $ticket_cost
 * @property Event $event
 * @property EventsTicketItem[] $eventsTicketItems
 */
class EventsTicket extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ticket_id';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['event_id', 'ticket_type', 'ticket_name', 'ticket_cost'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event()
    {
        return $this->belongsTo('App\Models\Event', null, 'event_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function eventsTicketItems()
    {
        return $this->hasMany('App\Models\EventsTicketItem', 'ticket_id', 'ticket_id');
    }
}
