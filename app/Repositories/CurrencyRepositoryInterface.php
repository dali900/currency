<?php
namespace App\Repositories;

use App\Models\Currency;
use Illuminate\Support\Collection;

interface CurrencyRepositoryInterface
{
   /**
    * Get today's currencies
    */
   public function getLatest() : Collection;

   /**
    * Saving new currency values
    */
   public function insertCurrencies(array $data);
}