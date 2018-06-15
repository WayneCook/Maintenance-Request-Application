<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class workOrder
 * @package App\Models
 * @version May 30, 2018, 11:48 pm UTC
 *
 * @property string name
 * @property string unit_number
 * @property string description
 * @property boolean permission_to_enter
 * @property boolean ugent
 * @property string comments
 */
class workOrder extends Model
{
    use SoftDeletes;

    public $table = 'work_orders';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'unit_number',
        'description',
        'permission_to_enter',
        'comments',
        'submitted_on',
        'order_status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'unit_number' => 'string',
        'description' => 'string',
        'permission_to_enter' => 'boolean',
        'comments' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
