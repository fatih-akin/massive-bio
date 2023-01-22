<?php

namespace App\Repositories\ExchangeRate;

use App\Models\ExchangeRate;

class ExchangeRateRepository implements ExchangeRateRepositoryInterface
{

    public function findMaxOrder(): int
    {
        return ExchangeRate::query()->max('order')??0;
    }
}
