<?php

/**
 * Created by IntelliJ IDEA.
 * User: simon
 * Date: 20/03/16
 * Time: 15:22
 */

/**
 * StartGeneratedWithDataObjectAnnotator
 * @property ErrorPage|DeprecatedErrorPageMethodsExtension owner
 * EndGeneratedWithDataObjectAnnotator
 */
class DeprecatedErrorPageMethodsExtension extends DataExtension
{
    /**
     * Set the path where static error files are saved through {@link publish()}.
     * Defaults to /assets.
     *
     * @deprecated 4.0 Use "ErrorPage.static_file_path" instead
     * @param string $path
     */
    static public function set_static_filepath($path)
    {
        Deprecation::notice('4.0', 'Use "ErrorPage.static_file_path" instead');
        self::config()->static_filepath = $path;
    }

    /**
     * @deprecated 4.0 Use "ErrorPage.static_file_path" instead
     * @return string
     */
    static public function get_static_filepath()
    {
        Deprecation::notice('4.0', 'Use "ErrorPage.static_file_path" instead');
        return self::config()->static_filepath;
    }

}