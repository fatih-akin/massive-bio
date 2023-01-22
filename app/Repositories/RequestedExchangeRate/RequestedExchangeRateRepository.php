<?php

namespace App\Repositories\RequestedExchangeRate;

use App\Models\RequestedExchangeRate;
use App\Models\User;

class RequestedExchangeRateRepository implements RequestedExchangeRateRepositoryInterface
{

    public function create($userId, $exchangeRateId): \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
    {
        return RequestedExchangeRate::query()->create([
            'user_id' => $userId,
            'exchange_rate_id' => $exchangeRateId
        ])->fresh();
    }
}
