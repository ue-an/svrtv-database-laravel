<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $event_id
 * @property string $event_name
 * @property string $event_type
 * @property EventsTicket[] $eventsTickets
 */
class Event extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'event_id';

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

    /**
     * @var array
     */
    protected $fillable = ['event_name', 'event_type'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function eventsTickets()
    {
        return $this->hasMany('App\Models\EventsTicket', null, 'event_id');
    }
}
