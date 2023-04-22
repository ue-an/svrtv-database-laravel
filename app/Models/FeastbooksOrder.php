<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $order_id
 * @property string $order_status
 * @property string $order_created
 * @property string $order_completed
 * @property FeastbookTransaction[] $feastbookTransactions
 */
class FeastbooksOrder extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'order_id';

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
    protected $fillable = ['order_status', 'order_created', 'order_completed'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function feastbookTransactions()
    {
        return $this->hasMany('App\Models\FeastbookTransaction', 'order_id', 'order_id');
    }
}
