<?php

namespace App\Listeners;

use App\Events\RequestedExchangeRateEvent;
use App\Models\ExchangeRate;
use App\Models\RequestedExchangeRate;
use App\Repositories\RequestedExchangeRate\RequestedExchangeRateRepositoryInterface;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class StoreRequestedExchangeRate
{
    private RequestedExchangeRateRepositoryInterface $repository;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(RequestedExchangeRateRepositoryInterface $repository)
    {
        //
        $this->repository = $repository;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\RequestedExchangeRateEvent  $event
     * @return void
     */
    public function handle(RequestedExchangeRateEvent $event)
    {
        $this->repository->create($event->user->id , $event->exchangeRate->id);
    }
}
