<?php namespace DevAlysonh\OrderSystem\Components;

use Cms\Classes\ComponentBase;
use DevAlysonh\OrderSystem\Models\Product;
use Flash;

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
        $this->page['name'] = 'products';
        $this->products = Product::paginate(5);
    }

	public function onSaveProduct()
	{
		$data = post();
		$price = $this->priceStringToIntTransform($data['price']);
		
		Product::create([
			'name' => $data['name'],
			'price' => $price
		]);

		Flash::success('Produto Cadastrado!');
		return redirect()->back();
	}

	public function onDeleteProduct()
	{
		$productId = post('id');
        $product = Product::find($productId);

        if (!$product) {
			Flash::error('Produto inválido');
			return redirect()->back();
		}

		$product->delete();
		Flash::success('O produto foi deletado');
		return redirect()->back();
	}

	public function onUpdateProduct()
	{
		$productId = post('product_id');
		$product = Product::find($productId);
		
		if (!$product) {
			Flash::error('O produto que você tentou editar, não existe.');
			return redirect()->back();
		}

		$product->name = post('name');
		$product->price = $this->priceStringToIntTransform(post('price'));
		$product->save();

		Flash::success('Os dados do produto foram atualizados!');
		return redirect()->back();
	}

    /**
     * @link https://docs.octobercms.com/3.x/element/inspector-types.html
     */
    public function defineProperties()
    {
        return [];
    }

	private function priceStringToIntTransform(string $str): int
	{
		return (int) preg_replace("/[^0-9]/", "", $str);
	}
}
