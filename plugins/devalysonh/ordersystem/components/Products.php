<?php namespace DevAlysonh\OrderSystem\Components;

use Cms\Classes\ComponentBase;
use DevAlysonh\OrderSystem\Models\Product;

/**
 * Products Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class Products extends ComponentBase
{
	public $products;

    public function componentDetails()
    {
        return [
            'name' => 'Products Component',
            'description' => 'No description provided yet...'
        ];
    }

	public function onRun()
    {   
        $this->page['name'] = 'Clients';
        $this->products = Product::paginate(5);
    }

    /**
     * @link https://docs.octobercms.com/3.x/element/inspector-types.html
     */
    public function defineProperties()
    {
        return [];
    }
}
