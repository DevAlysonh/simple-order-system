<?php namespace DevAlysonh\OrderSystem\Components;

use Cms\Classes\ComponentBase;

/**
 * Products Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class Products extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Products Component',
            'description' => 'No description provided yet...'
        ];
    }

    /**
     * @link https://docs.octobercms.com/3.x/element/inspector-types.html
     */
    public function defineProperties()
    {
        return [];
    }
}
