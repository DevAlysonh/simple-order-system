<?php namespace DevAlysonh\OrderSystem\Components;

use Cms\Classes\ComponentBase;
use DevAlysonh\OrderSystem\Models\Client;
use Flash;
use Illuminate\Database\Eloquent\Collection;
use Input;

/**
 * Clients Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class Clients extends ComponentBase
{
	public $clients;

    public function componentDetails()
    {
        return [
            'name' => 'Clients Component',
            'description' => 'No description provided yet...'
        ];
    }

	public function onRun()
    {   
        $this->page['name'] = 'Clients';
        $this->clients = Client::paginate(5);
    }

	public function onSave()
	{
		$data = post();

		if (!empty($data['other_gender'])) {
			$data['gender'] = $data['other_gender'];
			unset($data['other_gender']);
		}

		$client = new Client();
		$client->fill($data);
		$client->save();

		Flash::success('Cliente cadastrado!');
		return redirect('/clients');
	}

	public function onDelete()
    {
        $clientId = post('id');
        $client = Client::find($clientId);

        if ($client) {
            $client->delete();
			return redirect('/clients')->with('success', 'Cliente excluido.');
        }
    }

	public function onUpdate()
	{
		$clientId = post('client_id');
		$client = Client::find($clientId);
		
		if (!$client) {
			Flash::error('O cliente que você tentou editar, não existe.');
		}

		$client->name = post('name');
		$client->gender = post('gender');
		$client->save();

		Flash::success('Os dados do cliente foram atualizados!');
		return redirect()->back();
	}

    /**
     * @link https://docs.octobercms.com/3.x/element/inspector-types.html
     */
    public function defineProperties()
    {
        return [];
    }
}
