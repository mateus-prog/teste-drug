<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;

interface GroupRepositoryInterface
{
    public function all(int $limit = 0, int $offset = 0): object;
    public function store(array $request): Model;
    public function findById(int $id): object;
    public function update(int $id, array $set): void;
    public function delete(int $id): bool;
}
