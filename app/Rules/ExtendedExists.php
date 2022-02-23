<?php

namespace App\Rules;

use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Validation\Rule;

class ExtendedExists implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value, $parameters = []): bool
    {
        $tableName   = array_shift($parameters);
        $firstColumn = array_shift($parameters);

        $query = DB::table($tableName)->where($firstColumn, $value);

        foreach($parameters as $column) {
            $query->orWhere($column, $value);
        }

        return $query->count() > 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.extended_exists');
    }
}
