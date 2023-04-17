<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $fmm_id
 * @property string $user_id
 * @property string $donor_type
 * @property string $donation_start_date
 * @property string $donation_end_date
 * @property float $amount
 * @property string $pay_method
 * @property Attendee $attendee
 */
class FeastmercyministryRecord extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'fmm_id';

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
    protected $fillable = ['user_id', 'donor_type', 'donation_start_date', 'donation_end_date', 'amount', 'pay_method'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attendee()
    {
        return $this->belongsTo('App\Models\Attendee', 'user_id', 'user_id');
    }
}
