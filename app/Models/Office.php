<?php

namespace App\Models;

use App\Models\ExchangeRate;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'code',
        'name',
    ];

    /**
     * Returns the office exchange rates
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function rates()
    {
        return $this->hasMany(ExchangeRate::class);
    }

    /**
     * Find the office by id or code
     *
     * @return \App\Models\Office|null
     */
    public function findByIdOrCode(string $value, ?array $columns = ['*'])
    {
        return static::whereId($value)
            ->orWhere('code', $value)
            ->first($columns);
    }
}
