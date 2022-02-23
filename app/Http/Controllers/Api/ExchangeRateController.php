<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Arr;
use App\Models\ExchangeRate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\IndexExchangeRateRequest;
use App\Http\Requests\Api\StoreExchangeRateRequest;

class ExchangeRateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Http\Requests\Api\IndexExchangeRateRequest
     * @return \Illuminate\Http\Response
     */
    public function index(IndexExchangeRateRequest $request)
    {
        $data = $request->validated();

        return ExchangeRate::byDateAndOffice($data['at_date'], $data['office_id'])->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Api\StoreExchangeRateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExchangeRateRequest $request)
    {
        $data = $request->validated();

        ExchangeRate::updateOrCreate(
            Arr::only($data, ['currency_code', 'office_id', 'begins_at']),
            $data
        );

        return response()->json(['status' => 'success']);
    }
}
