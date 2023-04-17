<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $order_no
 * @property string $receipt_no
 * @property string $order_status
 * @property string $order_created_date
 * @property string $order_completed_date
 * @property string $pay_method
 * @property EventsTicketItem[] $eventsTicketItems
 */
class EventsOrder extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'order_no';

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
    protected $fillable = ['receipt_no', 'order_status', 'order_created_date', 'order_completed_date', 'pay_method'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function eventsTicketItems()
    {
        return $this->hasMany('App\Models\EventsTicketItem', 'order_no', 'order_no');
    }
}
