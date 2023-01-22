<?php

namespace App\Services;

use App\Models\ExchangeRate;
use App\Repositories\ExchangeRate\ExchangeRateRepository;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ExchangeRateService
{
    public function fetchExchangeRates(){
        $curl = curl_init();
        $apiKey = config('app.currency_exchange_api_key');

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.apilayer.com/exchangerates_data/latest?symbols=USD%2CGBP%2CEUR%2CJPY%2CAED&base=TRY",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: text/plain",
                "apikey: {$apiKey}"
            ),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET"
        ));
        $response = curl_exec($curl);
        $curlStatusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        if ($curlStatusCode=== ResponseAlias::HTTP_OK){
            return json_decode($response,JSON_PRETTY_PRINT);
        }
        return null;
    }

    public function storeExchangeRates(){
        $response = self::fetchExchangeRates();
        if ($response){
            $exchangeRateRepository = new ExchangeRateRepository();
            $maxOrder = $exchangeRateRepository->findMaxOrder();
            $exchangeDate = $response['date'];
            $rates = collect($response['rates'])->map(function ($value, $key) use ($exchangeDate, $maxOrder){
                return [
                    'name' =>$key,
                    'rate' =>$value,
                    'exchange_date' =>$exchangeDate,
                    'order' =>$maxOrder+1,
                    'created_at' =>Carbon::now(),
                    'updated_at' =>Carbon::now(),
                ];
            });
            ExchangeRate::query()
                ->insert($rates->toArray());
            return $response;
        }
    }

    public static function exchange($fromCurrency, $toCurrency, $amount){
        $exchangeRepository = new ExchangeRateRepository();
        $from = $exchangeRepository->findByCurrency($fromCurrency);
        $to = $exchangeRepository->findByCurrency($toCurrency);
        return round(($amount/$from->rate)*$to->rate, 2);
    }
}
