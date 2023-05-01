<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\ClientRequest;
use Illuminate\Database\QueryException;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::paginate();
        return view('clients.index', [
            'clients' => $clients
        ]);
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(ClientRequest $request)
    {
        $data = $request->validated();

        Client::create($data);

        return redirect()->route('clients.index');
    }

    public function edit(Client $client)
    {
        if (!$client){
            abort(404);
        }

        return view('clients.edit', [
            'client' => $client
        ]);
    }

    public function update(ClientRequest $request, Client $client)
    {
        if (!$client){
            abort(404);
        }

        $data = $request->validated();

        $client->updateOrFail($data);

        return redirect()->route('clients.index');
    }

    public function destroy(Client $client)
    {
        if (!$client){
            abort(404);
        }
        try {
            $client->delete();
        } catch (QueryException $exception) {
            throw new \Exception('You cannot delete this client, because' . $exception->getMessage())
        }
        return redirect()->route('clients.index');
    }
}
