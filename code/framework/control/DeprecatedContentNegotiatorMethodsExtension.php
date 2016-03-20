<?php

/**
 * Created by IntelliJ IDEA.
 * User: simon
 * Date: 20/03/16
 * Time: 16:08
 */
class DeprecatedContentNegotiatorMethodsExtension extends DataExtension
{

    /**
     * Set the character set encoding for this page.  By default it's utf-8, but you could change it to, say,
     * windows-1252, to improve interoperability with extended characters being imported from windows excel.
     *
     * @deprecated 4.0 Use the "ContentNegotiator.encoding" config setting instead
     */
    public static function set_encoding($encoding)
    {
        Deprecation::notice('4.0', 'Use the "ContentNegotiator.encoding" config setting instead');
        Config::inst()->update('ContentNegotiator', 'encoding', $encoding);
    }

    /**
     * Return the character encoding set bhy ContentNegotiator::set_encoding().  It's recommended that all classes
     * that need to specify the character set make use of this function.
     *
     * @deprecated 4.0 Use the "ContentNegotiator.encoding" config setting instead
     */
    public static function get_encoding()
    {
        Deprecation::notice('4.0', 'Use the "ContentNegotiator.encoding" config setting instead');
        return Config::inst()->get('ContentNegotiator', 'encoding');
    }


    /**
     * Enable content negotiation for all templates, not just those with the xml header.
     *
     * @deprecated 4.0 Use the "ContentNegotiator.enabled" config setting instead
     */
    public static function enable()
    {
        Deprecation::notice('4.0', 'Use the "ContentNegotiator.enabled" config setting instead');
        Config::inst()->update('ContentNegotiator', 'enabled', true);
    }

    /**
     * Disable content negotiation for all templates, not just those with the xml header.
     *
     * @deprecated 4.0 Use the "ContentNegotiator.enabled" config setting instead
     */
    public static function disable()
    {
        Deprecation::notice('4.0', 'Use the "ContentNegotiator.enabled" config setting instead');
        Config::inst()->update('ContentNegotiator', 'enabled', false);
    }

}