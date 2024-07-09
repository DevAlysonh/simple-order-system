<?php namespace DevAlysonh\OrderSystem\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Carbon\Carbon;
use DevAlysonh\OrderSystem\Models\Order as OrderModel;
use Flash;

use function PHPUnit\Framework\isEmpty;

/**
 * Order Backend Controller
 *
 * @link https://docs.octobercms.com/3.x/extend/system/controllers.html
 */
class Order extends Controller
{
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
    ];

    /**
     * @var string formConfig file
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string listConfig file
     */
    public $listConfig = 'config_list.yaml';

    /**
     * @var array required permissions
     */
    public $requiredPermissions = ['devalysonh.ordersystem.order'];

    /**
     * __construct the controller
     */
    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('DevAlysonh.OrderSystem', 'ordersystem', 'order');
    }

	public function onMassActionCloseOrder()
	{
		$orderIds = post('checked');

		if (empty($orderIds)) {
			Flash::error("Você precisa selecionar ao menos um pedido para faturar.");
			return redirect()->back();
		}

		$orders = OrderModel::whereIn('id', array_values($orderIds))
			->get();

		
		$orders->map(function ($order) {
			if (
				!$order->paid_at
				&& $order->status !== OrderModel::STATUS_PAID
			) {
				$order->status = OrderModel::STATUS_PAID;
				$order->paid_at = Carbon::now()->locale('pt_BR')->format('d/m/Y');
				$order->save();
			}
		});

		Flash::success('Os pedidos que estavam pendentes foram definidos com status pago.');
		return redirect()->back();
	}

	public function onCloseOrder()
	{
		$orderId = post('order_id');

		$order = OrderModel::find($orderId);
		if (!$order) {
			Flash::error("O pedido que você está tentando faturar é inválido ou não existe.");
			return redirect()->back();
		}

		if (
			!$order->paid_at
			&& $order->status !== OrderModel::STATUS_PAID
		) {
			$order->status = OrderModel::STATUS_PAID;
			$order->paid_at = Carbon::now()->locale('pt_BR')->format('d/m/Y');
			$order->save();

			Flash::success('Os pedidos que estavam pendentes foram definidos com status pago.');
			return redirect()->back();
		}

		Flash::error('O pedido já foi pago.');
		return redirect()->back();
	}
}
