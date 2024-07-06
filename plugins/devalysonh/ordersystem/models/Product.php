<?php namespace DevAlysonh\OrderSystem\Models;

use Model;

/**
 * Product Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Product extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table name
     */
    public $table = 'devalysonh_ordersystem_products';

    /**
     * @var array rules for validation
     */
    public $rules = [];

	protected $fillable = [
		'name',
		'price'
	];

    public function getPriceAttribute($value)
    {
        return number_format($value / 100, 2, ',', '.');
    }

	public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
