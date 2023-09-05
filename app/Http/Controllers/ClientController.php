<?php

namespace App\Http\Controllers;

use App\Http\Generators\ClientTableTableGenerator;
use App\Http\Interfaces\Repositories\ClientInterface;
use App\Http\Interfaces\Repositories\ClientRepositoryInterface;
use App\Models\Client;
use App\Http\Requests\ClientRequest;
use Illuminate\Database\QueryException;

class ClientController extends Controller
{
    public function __construct(
        protected ClientRepositoryInterface $clientRepository,
        protected ClientInterface $client,
    )
    {
    }

    public function index(ClientTableTableGenerator $generator)
    {
        $clients = $this->clientRepository->getWithFilters();
        return view('clients.index', [
            'clients' => $clients,
            'table' => $generator->handle()
        ]);
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(ClientRequest $request)
    {
        $this->client->store($request);

        return redirect()->route('clients.index');
    }

    public function show(Client $client) {
        return view('clients.show', [
            'client' => $client
        ]);
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
        $this->client->update($request, $client);

        return redirect()->route('clients.index');
    }

    public function destroy(Client $client)
    {
        $this->client->destroy($client);

        return redirect()->route('clients.index');
    }
}
