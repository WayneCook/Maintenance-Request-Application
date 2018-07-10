<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Event
 * @package App\Models
 * @version June 29, 2018, 5:42 pm UTC
 *
 * @property string title
 * @property string description
 * @property string details
 * @property string|\Carbon\Carbon start_date
 * @property string|\Carbon\Carbon end_date
 */
class Event extends Model
{
    use SoftDeletes;

    public $table = 'events';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'creator',
        'image',
        'description',
        'details',
        'start_date',
        'end_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'details' => 'string',
        // 'start_date' => 'datetime:YYYY-MM-DD HH:mm:ss',
        // 'end_date' => 'datetime:YYYY-MM-DD HH:mm:ss',

    ];



    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
