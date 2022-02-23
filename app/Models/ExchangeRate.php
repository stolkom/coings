<?php

namespace App\Models;

use App\Models\Office;
use App\Models\Currency;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Builder;

class ExchangeRate extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'begins_at' => 'datetime:d.m.Y H:i:s',
    ];

    protected $visible = [
        'currency',
        'buy',
        'sell',
        'begins_at',
        'office_id',
    ];

    /**
     * Returns the office where this exchange rate is valid
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    /**
     * Returns the currency for which this exchange rate is valid
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_code', 'code');
    }

    /**
     * Scope a query to only include exchange rates at specific datetime and in a specific office
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  string $beginsAt
     * @param  int $officeId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByDateAndOffice(Builder $query, string $beginsAt, int $officeId): Builder
    {
        $latestQuery = static::selectRaw('`currency_code` as `currency`, MAX(`begins_at`) as `rate_date`')
            ->where('begins_at', '<=', $beginsAt)
            ->where(function ($q) use ($officeId) {
                $q->whereNull('office_id')->orWhere('office_id', $officeId);
            })
            ->groupBy('currency_code');

        return $query->joinSub($latestQuery, 'latest', function($join) {
            $join->on('latest.currency', '=', "{$this->getTable()}.currency_code")
                ->on('latest.rate_date', '=', "{$this->getTable()}.begins_at");
            });
    }
}
