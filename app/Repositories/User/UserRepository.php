<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UserRepository implements UserRepositoryInterface
{
    public function create($attributes): User
    {
        $user =new User();
        $user->fill($attributes);
        $user->password = bcrypt($user->password);
        $user->save();

        return $user;
    }

    public function findByEmail($email): Builder|array|Collection|Model|null
    {
        return User::query()->where('email', $email)->first();
    }

}
