<?php
namespace App\Services;

use App\Repositories\CurrencyRepository;
use Illuminate\Support\Facades\Http;

class CurrencyService
{
    /**
     * Get currency values for specific date
     */
    public function fetchCurrencies($date=null)
    {
        if(empty($date))
        {
            $date = date('Y-m-d');
        }
        $api_key = config('currency.fixer_api_key');
        $currency_base = config('currency.currency_base');
        $currency_symbols = config('currency.currency_symbols');

        $response = Http::get("http://data.fixer.io/api/$date?access_key=$api_key&base=$currency_base&symbols=$currency_symbols&format=1");
        if($response->json()['success'])
        {
            $this->insertCurrencies($response->json());
        }
        else
        {
            throw new \Exception("API call faild. Error type: ".$response->json()['error']['type']);
        }
    }

    /**
     * Storing currency values from the api resposne
     */
    public function insertCurrencies($response_data)
    {
        $data = [];
        foreach ($response_data['rates'] as $symbol => $value)
        {
            $data[] = [
                'date' => $response_data['date'],
                'base' => $response_data['base'],
                'symbol' => $symbol,
                'value' => $value
            ];
        }
        $currency_repository = new CurrencyRepository();
        return $currency_repository->insertCurrencies($data);
    }

    /**
     * Get currency values for the past 7 days
     */
    public function fetchPastSevenDaysCurrencies()
    {
        for ($i=7; $i >= 1; $i--) 
        { 
            $date = \Carbon\Carbon::now()->subDays($i)->toDateString();
            $this->fetchCurrencies($date);
        }
    }
}
