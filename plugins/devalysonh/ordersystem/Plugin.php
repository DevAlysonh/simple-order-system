<?php namespace DevAlysonh\OrderSystem;

use Backend;
use System\Classes\PluginBase;

/**
 * Plugin Information File
 *
 * @link https://docs.octobercms.com/3.x/extend/system/plugins.html
 */
class Plugin extends PluginBase
{
    /**
     * pluginDetails about this plugin.
     */
    public function pluginDetails()
    {
        return [
            'name' => 'OrderSystem',
            'description' => 'No description provided yet...',
            'author' => 'DevAlysonh',
            'icon' => 'icon-leaf'
        ];
    }

    /**
     * register method, called when the plugin is first registered.
     */
    public function register()
    {
        //
    }

    /**
     * boot method, called right before the request route.
     */
    public function boot()
    {
        //
    }

    /**
     * registerComponents used by the frontend.
     */
    public function registerComponents()
    {
        return [
            'DevAlysonh\OrderSystem\Components\Clients' => 'clients',
        ];
    }

    /**
     * registerPermissions used by the backend.
     */
    public function registerPermissions()
    {
        return [
			'devalysonh.ordersystem.client' => [
				'tab' => 'Site',
				'label' => 'Client'
			],
			'devalysonh.ordersystem.product' => [
				'tab' => 'Site',
				'label' => 'Product'
			],
        ];
    }

    /**
     * registerNavigation used by the backend.
     */
    public function registerNavigation()
    {
        return [
            'client' => [
                'label' => 'Client',
                'url' => Backend::url('devalysonh/ordersystem/client'),
                'icon' => 'icon-leaf',
                'permissions' => ['devalysonh.ordersystem.client'],
                'order' => 500,
            ],
            'product' => [
                'label' => 'Product',
                'url' => Backend::url('devalysonh/ordersystem/product'),
                'icon' => 'icon-leaf',
                'permissions' => ['devalysonh.ordersystem.product'],
                'order' => 500,
            ],
        ];
    }
}
