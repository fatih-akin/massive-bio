<?php

namespace App\Http\Controllers;

use App\Models\ExchangeRate;
use App\Repositories\ExchangeRate\ExchangeRateRepositoryInterface;
use App\Services\ExchangeRateService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ExchangeRateController extends Controller
{

    private ExchangeRateRepositoryInterface $exchangeRateRepository;

    public function __construct(ExchangeRateRepositoryInterface $exchangeRateRepository)
    {
        $this->exchangeRateRepository = $exchangeRateRepository;
    }

    public function fetch(Request $request){
        Log::info('Handled Command');
        $exchangeRateService = new ExchangeRateService();
        $exchangeRateService->storeExchangeRates();
        Log::info('Finished Scheduling');


    }
}
