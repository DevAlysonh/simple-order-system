<?php namespace DevAlysonh\OrderSystem\Components;

use Carbon\Carbon;
use Cms\Classes\ComponentBase;
use DevAlysonh\OrderSystem\Models\Order;
use DevAlysonh\OrderSystem\Models\Product;
use Flash;
use Illuminate\Database\Eloquent\Collection;

/**
 * OrderProfile Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class OrderProfile extends ComponentBase
{
	public $order;
	public $orderProducts;
	public $orderTotal;
	public $allProducts;

    public function componentDetails()
    {
        return [
            'name' => 'Order Profile Component',
            'description' => 'No description provided yet...'
        ];
    }

    /**
     * @link https://docs.octobercms.com/3.x/element/inspector-types.html
     */
    public function defineProperties()
    {
        return [
			'orderId' => [
				'title'       => 'Order ID',
                'description' => 'The ID of the order',
                'default'     => '{{ :id }}',
                'type'        => 'string',
			]
		];
    }

	public function onRun()
    {
		$this->allProducts = Product::all();
        $this->order = $this->loadOrder();
		$this->orderProducts = $this->getProducts();
		$this->orderTotal = $this->getOrderTotalCost();
    }

	public function onCloseOrder()
	{
		$order = Order::find(post('id'));
		$order->paid_at = Carbon::now()->locale('pt_BR')->format('d/m/Y');
		$order->status = 'pago';
		$order->save();

		Flash::success('Pedido fechado com sucesso.');

		return redirect()->back();
	}

	public function onSaveOrderProduct()
	{
		$product = Product::find(post('product_id'));
		$order = Order::find(post('order_id'));

		if (!$product || !$order) {
			Flash::error('O pedido ou o item são inválidos.');
			return redirect()->back();
		}

		$order->products()->attach($product->id);
		$order->save();

		return redirect()->back();
	}

    protected function loadOrder()
    {
        $orderId = $this->property('orderId');
        return Order::find($orderId);
    }

	private function getOrderTotalCost()
	{
		$orderTotal = 0;

		$products = $this->order->products;

		$orderTotal = $products->sum('price');

		if ($orderTotal > 0) {
			return number_format($orderTotal / 100, 2, ',', '.');
		}

		return $orderTotal;
	}

	private function getProducts()
	{
		$productCollection = new Collection();
		$products = $this->order->products;

		$products->map(function ($product) use ($productCollection) {
			$productCollection->push([
				'name' => $product->name,
				'price' => number_format($product->price / 100, 2, ',', '.')
			]);
		});

		return $productCollection;
	}
}
