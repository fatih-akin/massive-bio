<?php

namespace App\Repositories\RequestedExchangeRate;

use App\Models\RequestedExchangeRate;

interface RequestedExchangeRateRepositoryInterface
{
    public function create($userId, $exchangeRateId):\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model;
}
