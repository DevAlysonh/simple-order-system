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

	protected $fillable = [
		'client_id',
		'status',
		'paid_at'
	];

	public function products()
    {
        return $this->belongsToMany(Product::class);
    }

	public function client()
	{
		return $this->belongsTo(Client::class, 'client_id', 'id');
	}
}
