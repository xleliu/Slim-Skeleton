<?php

if (!function_exists('view')) {
    /**
     * Get the evaluated view contents for the given view.
     *
     * @param  string  $view
     * @param  array   $data
     * @param  array   $mergeData
     * @return \Xiaoler\View\View
     */
    function view($view = null, $data = [], $mergeData = [])
    {
        $factory = $GLOBALS['container']['blade'];

        if (func_num_args() === 0) {
            return $factory;
        }

        return $factory->make($view, $data, $mergeData);
    }
}
