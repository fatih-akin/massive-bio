<?php

namespace App\Repositories\ExchangeRate;

use App\Models\ExchangeRate;

class ExchangeRateRepository implements ExchangeRateRepositoryInterface
{

    public function findMaxOrder(): int
    {
        return ExchangeRate::query()->max('order')??0;
    }

    public function findByCurrency($currency): \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|null
    {
        return ExchangeRate::query()
            ->where('name', $currency)
            ->orderBy('order', 'desc')
            ->first();
    }


}
