<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $feast_media_event_id
 * @property string $user_id
 * @property string $event_name
 * @property string $ticket_type
 * @property string $event_type
 * @property string $event_date
 * @property float $ticket_cost
 * @property Attendee $attendee
 */
class FeastmediaRecord extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'feast_media_event_id';

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
    protected $fillable = ['user_id', 'event_name', 'ticket_type', 'event_type', 'event_date', 'ticket_cost'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attendee()
    {
        return $this->belongsTo('App\Models\Attendee', 'user_id', 'user_id');
    }
}
