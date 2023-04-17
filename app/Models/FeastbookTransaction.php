<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $feastbook_id
 * @property string $order_id
 * @property string $product_id
 * @property string $user_id
 * @property integer $quantity
 * @property FeastbooksOrder $feastbooksOrder
 * @property FeastbooksProduct $feastbooksProduct
 * @property Attendee $attendee
 */
class FeastbookTransaction extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'feastbook_id';

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
    protected $fillable = ['order_id', 'product_id', 'user_id', 'quantity'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function feastbooksOrder()
    {
        return $this->belongsTo('App\Models\FeastbooksOrder', 'order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function feastbooksProduct()
    {
        return $this->belongsTo('App\Models\FeastbooksProduct', 'product_id', 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attendee()
    {
        return $this->belongsTo('App\Models\Attendee', 'user_id', 'user_id');
    }
}
