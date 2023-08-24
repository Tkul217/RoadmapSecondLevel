<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\Repositories\ClientRepositoryInterface;
use App\Models\Client;
use Illuminate\Pagination\LengthAwarePaginator;

class ClientRepository implements ClientRepositoryInterface
{
    public function getAll(): LengthAwarePaginator
    {
        return Client::paginate();
    }

    public function create(array $data): Client
    {
        return Client::create($data);
    }

    /**
     * @throws \Throwable
     */
    public function updateOrFail(Client $client, array $data): bool
    {
        return $client->updateOrFail($data);
    }

    public function delete(Client $client): bool
    {
        return $client->delete();
    }
}
