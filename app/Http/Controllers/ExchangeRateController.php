<?php

namespace App\Http\Controllers;

use App\Events\RequestedExchangeRateEvent;
use App\Http\Requests\ExchangeRequest;
use App\Http\Requests\FindRateRequest;
use App\Http\Requests\ShowRateRequest;
use App\Http\Resources\ExchangeRateResource;
use App\Models\ExchangeRate;
use App\Repositories\ExchangeRate\ExchangeRateRepositoryInterface;
use App\Services\ExchangeRateService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ExchangeRateController extends Controller
{

    private ExchangeRateRepositoryInterface $exchangeRateRepository;

    public function __construct(ExchangeRateRepositoryInterface $exchangeRateRepository)
    {
        $this->exchangeRateRepository = $exchangeRateRepository;
    }

    public function show(ShowRateRequest $request){
        $exchangeRate = $this->exchangeRateRepository->findByCurrency($request->validated('currency'));
        event(new RequestedExchangeRateEvent(Auth::user(), $exchangeRate));

        return new ExchangeRateResource($exchangeRate);
    }

    public function exchange(ExchangeRequest $request){
        return  ExchangeRateService::exchange($request->validated('from') , $request->validated('to'), $request->validated('amount'));
    }
}
