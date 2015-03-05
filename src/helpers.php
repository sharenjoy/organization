<?php

if ( ! function_exists('employee'))
{
    /**
     * To output the employee object
     * from the certain user
     */
    function employee($userId = null)
    {
        if (is_null($userId))
        {
            $userId = session('user')['id'];
        }

        return app()->make('Sharenjoy\Organization\Models\Employee')->whereUserId($userId)->first();
    }
}

