<?php

namespace App\Repositories\Elouquent;

use App\Models\Client;
use App\Repositories\Contracts\ClientRepositoryInterface;

class ClientRepository extends AbstractRepository implements ClientRepositoryInterface
{
    protected $model = Client::class;
}
