<?php

/**
 * Created by IntelliJ IDEA.
 * User: simon
 * Date: 21/03/16
 * Time: 19:29
 */
class DeprecatedImagickBackendMethodsExtension extends DataExtension
{

    /**
     * set_default_quality
     *
     * @deprecated 4.0 Use the "ImagickBackend.default_quality" config setting instead
     * @param int $quality
     * @return void
     */
    public static function set_default_quality($quality) {
        Deprecation::notice('4.0', 'Use the "ImagickBackend.default_quality" config setting instead');
        if(is_numeric($quality) && (int) $quality >= 0 && (int) $quality <= 100) {
            Config::inst()->update('ImagickBackend', 'default_quality', (int) $quality);
        }
    }
    
}