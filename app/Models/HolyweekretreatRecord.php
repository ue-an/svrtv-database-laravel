<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $hwr_id
 * @property string $user_id
 * @property string $event_date
 * @property Attendee $attendee
 */
class HolyweekretreatRecord extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'hwr_id';

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
    protected $fillable = ['user_id', 'event_date'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attendee()
    {
        return $this->belongsTo('App\Models\Attendee', 'user_id', 'user_id');
    }
}
