<?php

namespace App\Repositories;

use App\Models\workOrder;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class workOrderRepository
 * @package App\Repositories
 * @version May 30, 2018, 11:48 pm UTC
 *
 * @method workOrder findWithoutFail($id, $columns = ['*'])
 * @method workOrder find($id, $columns = ['*'])
 * @method workOrder first($columns = ['*'])
*/
class workOrderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'unit_number',
        'description',
        'permission_to_enter',
        'ugent',
        'comments'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return workOrder::class;
    }
}
