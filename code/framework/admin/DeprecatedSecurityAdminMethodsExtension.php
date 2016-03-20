<?php

/**
 * Created by IntelliJ IDEA.
 * User: simon
 * Date: 20/03/16
 * Time: 15:48
 */
class DeprecatedSecurityAdminMethodsExtension extends DataExtension
{
    /**
     * The permissions represented in the $codes will not appearing in the form
     * containing {@link PermissionCheckboxSetField} so as not to be checked / unchecked.
     *
     * @deprecated 4.0 Use "Permission.hidden_permissions" config setting instead
     * @param $codes String|Array
     */
    public static function add_hidden_permission($codes)
    {
        if (is_string($codes)) $codes = array($codes);
        Deprecation::notice('4.0', 'Use "Permission.hidden_permissions" config setting instead');
        Config::inst()->update('Permission', 'hidden_permissions', $codes);
    }

    /**
     * @deprecated 4.0 Use "Permission.hidden_permissions" config setting instead
     * @param $codes String|Array
     */
    public static function remove_hidden_permission($codes)
    {
        if (is_string($codes)) $codes = array($codes);
        Deprecation::notice('4.0', 'Use "Permission.hidden_permissions" config setting instead');
        Config::inst()->remove('Permission', 'hidden_permissions', $codes);
    }

    /**
     * @deprecated 4.0 Use "Permission.hidden_permissions" config setting instead
     * @return Array
     */
    public static function get_hidden_permissions()
    {
        Deprecation::notice('4.0', 'Use "Permission.hidden_permissions" config setting instead');
        Config::inst()->get('Permission', 'hidden_permissions', Config::FIRST_SET);
    }

    /**
     * Clear all permissions previously hidden with {@link add_hidden_permission}
     *
     * @deprecated 4.0 Use "Permission.hidden_permissions" config setting instead
     */
    public static function clear_hidden_permissions()
    {
        Deprecation::notice('4.0', 'Use "Permission.hidden_permissions" config setting instead');
        Config::inst()->remove('Permission', 'hidden_permissions', Config::anything());
    }

}