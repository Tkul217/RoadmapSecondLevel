<?php

namespace App\Http\Services;

use App\Http\Interfaces\Repositories\ClientInterface;
use App\Http\Interfaces\Repositories\ClientRepositoryInterface;
use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Database\QueryException;

class ClientService implements ClientInterface
{
    protected $clientRepository;
    public function __construct(
        ClientRepositoryInterface $clientRepository
    )
    {
        $this->clientRepository = $clientRepository;
    }

    public function store(ClientRequest $request): void
    {
        $data = $request->validated();

        $this->clientRepository->create($data);
    }

    public function update(ClientRequest $request, $client): void
    {
        if (!$client){
            abort(404);
        }

        $data = $request->validated();

        $client->updateOrFail($data);
    }

    public function destroy(Client $client): void
    {
        if (!$client){
            abort(404);
        }
        try {
            $this->clientRepository->delete($client);
        } catch (QueryException $exception) {
            throw new \Exception('You cannot delete this client, because' . $exception->getMessage());
        }
    }
}
