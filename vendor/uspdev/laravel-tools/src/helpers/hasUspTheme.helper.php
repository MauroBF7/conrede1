<?php

use Composer\InstalledVersions;
/**
 * Verifica se a biblioteca larave-usp-theme está instalada
 *
 * @return boolean
 * @author Masaki K Neto, em 29/11/2021
 */
if (!function_exists('hasUspTheme')) {

    function hasUspTheme(bool $humanReadable = false)
    {
        $package = 'uspdev/laravel-usp-theme';
        if(InstalledVersions::isInstalled($package)) {
            return InstalledVersions::getPrettyVersion($package);
        }
        return $humanReadable ? 'false' : false;
    }
}
