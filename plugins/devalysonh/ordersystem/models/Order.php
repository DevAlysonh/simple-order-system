<?php namespace DevAlysonh\OrderSystem\Models;

use Model;

/**
 * Order Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Order extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table name
     */
    public $table = 'devalysonh_ordersystem_orders';

    /**
     * @var array rules for validation
     */
    public $rules = [];
}
