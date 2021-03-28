<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Repositories\CurrencyRepository;
use App\Services\CurrencyService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Currency.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getCurrecies(CurrencyService $currecy_service, CurrencyRepository $currecy_repository)
    {
        $total_currencies = Currency::count();
        
        /**
         * Initially get and store the currency values from the last seven days
         */
        if($total_currencies === 0)
        {
            $currecy_service->fetchPastSevenDaysCurrencies();
            $currecy_service->fetchCurrencies();
        }
        $data = [
            'base' => config('currency.currency_base'),
            'currencies' => $currecy_repository->getLatest()->toArray()
        ];
        return $this->successResponse($data);

    }
}
