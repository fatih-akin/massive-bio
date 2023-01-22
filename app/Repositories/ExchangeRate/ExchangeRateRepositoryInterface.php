<?php

namespace App\Repositories\ExchangeRate;

interface ExchangeRateRepositoryInterface
{
    public function findMaxOrder(): int;
}
