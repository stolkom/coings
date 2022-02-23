<?php

namespace App\Http\Requests\Api;

use Carbon\Carbon;
use App\Models\Office;
use App\Http\Requests\Api\BaseRequest;

class IndexExchangeRateRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'office_id' => 'required|string|between:1,255|extended_exists:offices,id,code',
            'at_date'   => 'required|date',
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

        return [
            'office_id' => Office::findByIdOrCode($validated['office_id'], ['id'])->id,
            'at_date'   => Carbon::parse($validated['at_date']),
        ];
    }
}
