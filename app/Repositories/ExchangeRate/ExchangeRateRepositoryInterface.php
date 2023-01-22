<?php

namespace App\Repositories\ExchangeRate;

use App\Models\ExchangeRate;

interface ExchangeRateRepositoryInterface
{
    public function findMaxOrder(): int;
    public function findByCurrency(string $currency): \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|null;
}
