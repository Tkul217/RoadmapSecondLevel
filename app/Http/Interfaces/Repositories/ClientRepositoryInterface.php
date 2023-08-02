<?php

namespace App\Http\Interfaces\Repositories;

use App\Models\Client;
use Illuminate\Pagination\LengthAwarePaginator;

interface ClientRepositoryInterface
{
    public function getAll(): LengthAwarePaginator;
    public function create(array $data): Client;
    public function updateOrFail(Client $client, array $data): bool;
    public function delete(Client $client): bool;
}
