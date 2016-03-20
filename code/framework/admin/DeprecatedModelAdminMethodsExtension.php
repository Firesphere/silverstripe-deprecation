<?php

/**
 * Created by IntelliJ IDEA.
 * User: simon
 * Date: 20/03/16
 * Time: 15:45
 */
class DeprecatedModelAdminMethodsExtension extends DataExtension
{
    /**
     * overwrite the static page_length of the admin panel,
     * should be called in the project _config file.
     *
     * @deprecated 4.0 Use "ModelAdmin.page_length" config setting
     */
    public static function set_page_length($length)
    {
        Deprecation::notice('4.0', 'Use "ModelAdmin.page_length" config setting');
        self::getOwner()->config()->page_length = $length;
    }

    /**
     * Return the static page_length of the admin, default as 30
     *
     * @deprecated 4.0 Use "ModelAdmin.page_length" config setting
     */
    public static function get_page_length()
    {
        Deprecation::notice('4.0', 'Use "ModelAdmin.page_length" config setting');
        return self::getOwner()->config()->page_length;
    }

}