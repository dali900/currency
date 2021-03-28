<?php
namespace App\Repositories;

use App\Models\Currency;
use Illuminate\Support\Collection;

class CurrencyRepository implements CurrencyRepositoryInterface
{
    public function getLatest() : Collection
    {
        return Currency::where('date', date('Y-m-d'))->get();
    }

    public function insertCurrencies($data)
    {
        return Currency::insert($data);
    }
    
}
