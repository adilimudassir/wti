<?php

if (! function_exists('includeFilesInFolder')) {
    /**
     * Loops through a folder and requires all PHP files
     * Searches sub-directories as well.
     *
     * @param $folder
     */
    function includeFilesInFolder($folder)
    {
        try {
            $directoryIterator = new RecursiveDirectoryIterator($folder);
            $iterator = new RecursiveIteratorIterator($directoryIterator);

            while ($iterator->valid()) {
                if (
                    ! $iterator->isDot() &&
                    $iterator->isFile() &&
                    $iterator->isReadable() &&
                    $iterator->current()->getExtension() === 'php'
                ) {
                    require_once $iterator->key();
                }

                $iterator->next();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

if (! function_exists('includeRouteFiles')) {

    /**
     * @param $folder
     */
    function includeRouteFiles($folder)
    {
        includeFilesInFolder($folder);
    }
}

if (! function_exists('home_route')) {
    function home_route()
    {
        return route('dashboard');
    }
}


if (!function_exists('currency')) {
    function currency($currency)
    {
        $instance = new \NumberFormatter("en_NG", \NumberFormatter::CURRENCY);

        return $instance->format($currency);
        // setlocale(LC_MONETARY, 'en_NG.UTF-8');
        // return money_format('%.2n', $currency);
    }
}
