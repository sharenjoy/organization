<?php

if ( ! function_exists('employee'))
{
    /**
     * To output the employee object
     */
    function employee($id)
    {
        if (is_array($id))
        {
            return app()->make('Sharenjoy\Organization\Models\Employee')->whereIn('id', $id)->get();
        }

        return app()->make('Sharenjoy\Organization\Models\Employee')->find($id);
    }
}

if ( ! function_exists('employeeByUserId'))
{
    /**
     * To output the employee object
     * from the certain user
     */
    function employeeByUserId($userId = null)
    {
        if (is_array($userId))
        {
            return app()->make('Sharenjoy\Organization\Models\Employee')->whereIn('user_id', $userId)->get();
        }

        if (is_null($userId))
        {
            $userId = session('user')['id'];
        }

        return app()->make('Sharenjoy\Organization\Models\Employee')->whereUserId($userId)->first();
    }
}

