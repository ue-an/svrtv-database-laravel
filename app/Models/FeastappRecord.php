<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $feastapp_id
 * @property string $user_id
 * @property string $date_downloaded
 * @property Attendee $attendee
 */
class FeastappRecord extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'feastapp_id';

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
    protected $fillable = ['user_id', 'date_downloaded'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attendee()
    {
        return $this->belongsTo('App\Models\Attendee', 'user_id', 'user_id');
    }
}
