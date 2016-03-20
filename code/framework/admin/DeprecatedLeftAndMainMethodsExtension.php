<?php

/**
 * Created by IntelliJ IDEA.
 * User: simon
 * Date: 20/03/16
 * Time: 15:41
 */
class DeprecatedLeftAndMainMethodsExtension extends DataExtension
{
    /**
     * Sets the href for the anchor on the Silverstripe logo in the menu
     *
     * @deprecated since version 4.0
     *
     * @param String $link
     */
    public static function set_application_link($link)
    {
        Deprecation::notice('4.0', 'Use the "LeftAndMain.application_link" config setting instead');
        Config::inst()->update('LeftAndMain', 'application_link', $link);
    }

    /**
     * @param String $name
     * @deprecated since version 4.0
     */
    public static function setApplicationName($name)
    {
        Deprecation::notice('4.0', 'Use the "LeftAndMain.application_name" config setting instead');
        Config::inst()->update('LeftAndMain', 'application_name', $name);
    }

    /**
     * Register the given javascript file as required in the CMS.
     * Filenames should be relative to the base, eg, FRAMEWORK_DIR . '/javascript/loader.js'
     *
     * @deprecated since version 4.0
     */
    public static function require_javascript($file)
    {
        Deprecation::notice('4.0', 'Use "LeftAndMain.extra_requirements_javascript" config setting instead');
        Config::inst()->update('LeftAndMain', 'extra_requirements_javascript', array($file => array()));
    }

    /**
     * Register the given stylesheet file as required.
     * @deprecated since version 4.0
     *
     * @param $file String Filenames should be relative to the base, eg, THIRDPARTY_DIR . '/tree/tree.css'
     * @param $media String Comma-separated list of media-types (e.g. "screen,projector")
     * @see http://www.w3.org/TR/REC-CSS2/media.html
     */
    public static function require_css($file, $media = null)
    {
        Deprecation::notice('4.0', 'Use "LeftAndMain.extra_requirements_css" config setting instead');
        Config::inst()->update('LeftAndMain', 'extra_requirements_css', array($file => array('media' => $media)));
    }

    /**
     * Register the given "themeable stylesheet" as required.
     * Themeable stylesheets have globally unique names, just like templates and PHP files.
     * Because of this, they can be replaced by similarly named CSS files in the theme directory.
     *
     * @deprecated since version 4.0
     *
     * @param $name String The identifier of the file.  For example, css/MyFile.css would have the identifier "MyFile"
     * @param $media String Comma-separated list of media-types (e.g. "screen,projector")
     */
    public static function require_themed_css($name, $media = null)
    {
        Deprecation::notice('4.0', 'Use "LeftAndMain.extra_requirements_themedCss" config setting instead');
        Config::inst()->update('LeftAndMain', 'extra_requirements_themedCss', array($name => array('media' => $media)));
    }


}