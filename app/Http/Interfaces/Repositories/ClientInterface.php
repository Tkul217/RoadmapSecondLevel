<?php

namespace App\Http\Interfaces\Repositories;

use App\Http\Requests\ClientRequest;
use App\Models\Client;

interface ClientInterface
{
    public function store(ClientRequest $request): void;
    public function update(ClientRequest $request, $client): void;
    public function destroy(Client $client): void;
}
