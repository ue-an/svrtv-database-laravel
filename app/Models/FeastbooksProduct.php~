<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $product_id
 * @property string $product_name
 * @property float $cost
 * @property string $variation
 * @property string $category
 * @property FeastbookTransaction[] $feastbookTransactions
 */
class FeastbooksProduct extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'product_id';

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
    protected $fillable = ['product_name', 'cost', 'variation', 'category'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function feastbookTransactions()
    {
        return $this->hasMany('App\Models\FeastbookTransaction', 'product_id', 'product_id');
    }
}
