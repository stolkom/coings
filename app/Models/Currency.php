<?php

namespace App\Models;

use App\Models\ExchangeRate;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $primaryKey = 'code';
    public $incrementing  = false;
    public $timestamps    = false;
    protected $guarded    = [];

    /**
     * Returns the currency rates
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function rates()
    {
        return $this->hasMany(ExchangeRate::class, 'currency_code', 'code');
    }
}
