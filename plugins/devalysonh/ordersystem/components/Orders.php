<?php namespace DevAlysonh\OrderSystem\Components;

use Cms\Classes\ComponentBase;
use DevAlysonh\OrderSystem\Models\Client;
use DevAlysonh\OrderSystem\Models\Order;
use Flash;

/**
 * Orders Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class Orders extends ComponentBase
{
	public $orders;
	public $clients;

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

	public function onSaveOrder()
	{
		$data = post();

		Order::create($data);
		Flash::success('Pedido gerado com sucesso, acesse o pedido para adicionar itens.');
		return redirect('/orders');
	}

	public function onDeleteOrder()
	{
		$orderId = post('id');
        $order = Order::find($orderId);

        if ($order) {
            $order->delete();
			Flash::success('Pedido excluido');
			return redirect()->back();
        }
	}

	public function onRun()
	{
		$this->clients = Client::all();
		$this->page['name'] = 'Products';
		$this->orders = Order::paginate(5);
	}
}
