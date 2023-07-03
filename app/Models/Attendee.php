<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

/**
 * @property string $user_id
 * @property string $email
 * @property string $last_name
 * @property string $first_name
 * @property string $mobile_no
 * @property boolean $is_bonafied
 * @property boolean $is_feast_attendee
 * @property string $feast_name
 * @property string $feast_district
 * @property string $address
 * @property string $city
 * @property string $country
 * @property EventsTicketItem[] $eventsTicketItems
 * @property FeastappRecord[] $feastappRecords
 * @property FeastbookTransaction[] $feastbookTransactions
 * @property FeastmediaRecord[] $feastmediaRecords
 * @property FeastmercyministryRecord[] $feastmercyministryRecords
 * @property FeastphRecord[] $feastphRecords
 * @property HolyweekretreatRecord[] $holyweekretreatRecords
 */
class Attendee extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'user_id';

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
    protected $fillable = ['user_id','email', 'last_name', 'first_name', 'mobile_no', 'is_bonafied', 'is_feast_attendee', 'feast_name', 'feast_district', 'address', 'city', 'country'];

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function eventsTicketItems()
    {
        return $this->hasMany('App\Models\EventsTicketItem', 'user_id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function feastappRecords()
    {
        return $this->hasMany('App\Models\FeastappRecord', 'user_id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function feastbookTransactions()
    {
        return $this->hasMany('App\Models\FeastbookTransaction', 'user_id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function feastmediaRecords()
    {
        return $this->hasMany('App\Models\FeastmediaRecord', 'user_id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function feastmercyministryRecords()
    {
        return $this->hasMany('App\Models\FeastmercyministryRecord', 'user_id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function feastphRecords()
    {
        return $this->hasMany('App\Models\FeastphRecord', 'user_id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function holyweekretreatRecords()
    {
        return $this->hasMany('App\Models\HolyweekretreatRecord', 'user_id', 'user_id');
    }

//     public function scopeFilter($query, array $filters)
// {
//     /* 
//     Hey $query! whenever u get 'search term' in URL, call the function.
//     If ['search'] exists or != null, then pass its value to the function
//     else return false and don't execute the $query. If value exists,
//     Then the function will execute the query and returns a result.
//     */
//     $query->when(
//         $filters['search'] ?? false,
//         fn ($query, $search) =>
//         $query
//             ->whereHas('users', function ($query) use ($search) {
//                 return $query
//                     ->where('name', 'like', '%' . $search . '%');
//             })
//             ->where('name', 'like', '%' . $search . '%')
//             ->orWhere('caption', 'like', '%' . $search . '%')
//             ->orWhere('description', 'like', '%' . $search . '%')
//             ->orWhere('id', $search)
//     );
// }
}
