<?php

namespace App\Repositories\Elouquent;

use App\Models\Group;
use App\Repositories\Contracts\GroupRepositoryInterface;

class GroupRepository extends AbstractRepository implements GroupRepositoryInterface
{
    protected $model = Group::class;
}
