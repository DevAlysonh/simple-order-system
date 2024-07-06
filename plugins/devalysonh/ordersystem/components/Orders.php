<?php namespace DevAlysonh\OrderSystem\Components;

use Cms\Classes\ComponentBase;

/**
 * Orders Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class Orders extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Orders Component',
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
