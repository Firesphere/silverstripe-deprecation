<?php

/**
 * class DeprecatedObjectMethodsExtension handles deprecated methods from Object.
 *
 * @property DeprecatedObjectMethodsExtension|Object owner
 */
class DeprecatedObjectMethodsExtension extends DataExtension
{

    /**
     * @deprecated
     */
    public static function get_static($class, $name, $uncached = false)
    {
        Deprecation::notice('4.0', 'Replaced by Config#get');
        return Config::inst()->get($class, $name, Config::FIRST_SET);
    }

    /**
     * @deprecated
     */
    public static function set_static($class, $name, $value)
    {
        Deprecation::notice('4.0', 'Replaced by Config#update');
        Config::inst()->update($class, $name, $value);
    }

    /**
     * @deprecated
     */
    public static function uninherited_static($class, $name, $uncached = false)
    {
        Deprecation::notice('4.0', 'Replaced by Config#get');
        return Config::inst()->get($class, $name, Config::UNINHERITED);
    }

    /**
     * @deprecated
     */
    public static function combined_static($class, $name, $ceiling = false)
    {
        if ($ceiling) throw new Exception('Ceiling argument to combined_static is no longer supported');

        Deprecation::notice('4.0', 'Replaced by Config#get');
        return Config::inst()->get($class, $name);
    }

    /**
     * @deprecated
     */
    public static function addStaticVars($class, $properties, $replace = false)
    {
        Deprecation::notice('4.0', 'Replaced by Config#update');
        foreach ($properties as $prop => $value) self::add_static_var($class, $prop, $value, $replace);
    }

    /**
     * @deprecated
     */
    public static function add_static_var($class, $name, $value, $replace = false)
    {
        Deprecation::notice('4.0', 'Replaced by Config#remove and Config#update');

        if ($replace) Config::inst()->remove($class, $name);
        Config::inst()->update($class, $name, $value);
    }


}