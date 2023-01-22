<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface UserRepositoryInterface
{
    public function create($data): User;

    public function findByEmail($email): Builder|array|Collection|Model|null;

}
