<?php namespace DevAlysonh\OrderSystem\Models;

use Model;

/**
 * Client Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Client extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table name
     */
    public $table = 'devalysonh_ordersystem_clients';

    /**
     * @var array rules for validation
     */
    public $rules = [];

	protected $fillable = [
		'name',
		'gender'
	];

	public function orders()
	{
		return $this->hasMany(Order::class);
	}
}
