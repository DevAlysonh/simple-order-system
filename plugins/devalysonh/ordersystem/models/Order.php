<?php 

namespace DevAlysonh\OrderSystem\Models;

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
    public $table = 'orders';

    /**
     * @var array rules for validation
     */
    public $rules = [];

	protected $fillable = [
		'client_id',
		'status',
		'paid_at'
	];

	public $belongsToMany = [
        'products' => [\DevAlysonh\OrderSystem\Models\Product::class, 'table' => 'order_product']
    ];

	public $belongsTo = [
        'client' => \DevAlysonh\OrderSystem\Models\Client::class
    ];
}
