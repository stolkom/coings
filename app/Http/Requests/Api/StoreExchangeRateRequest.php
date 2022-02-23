<?php

namespace App\Http\Requests\Api;

use Carbon\Carbon;
use App\Models\Office;
use Illuminate\Support\Arr;
use App\Http\Requests\Api\BaseRequest;

class StoreExchangeRateRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'office_id' => 'nullable|string|between:1,255|extended_exists:offices,id,code',
            'currency'  => 'required|string|size:3|exists:currencies,code',
            'buy'       => 'required|numeric|between:0.01,999999999999.99',
            'sell'      => 'required|numeric|between:0.01,999999999999.99',
            'begins_at' => 'required|date',
        ];
    }

    /**
     * Get the validated data from the request.
     *
     * @return array
     */
    public function validated(): array
    {
        $validated = parent::validated();

        $validated['currency_code'] = Arr::pull($validated, 'currency');

        return array_merge($validated, [
            'office_id'     => isset($validated['office_id'])
                ? Office::findByIdOrCode($validated['office_id'], ['id'])->id
                : null,
            'begins_at'     => Carbon::parse($validated['begins_at'])->toDateTimeString(),
        ]);
    }
}
