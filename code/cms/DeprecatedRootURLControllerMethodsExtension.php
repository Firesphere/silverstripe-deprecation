<?php

/**
 * Created by IntelliJ IDEA.
 * User: simon
 * Date: 20/03/16
 * Time: 15:17
 */
class DeprecatedRootURLControllerMethodsExtension extends DataExtension
{
    /**
     * Set the URL Segment used for your homepage when it is created by dev/build.
     * This allows you to use home page URLs other than the default "home".
     *
     * @deprecated 4.0 Use the "RootURLController.default_homepage_link" config setting instead
     * @param string $urlsegment the URL segment for your home page
     */
    static public function set_default_homepage_link($urlsegment = "home") {
        Deprecation::notice('4.0', 'Use the "RootURLController.default_homepage_link" config setting instead');
        Config::inst()->update('RootURLController', 'default_homepage_link', $urlsegment);
    }

    /**
     * Gets the link that denotes the homepage if there is not one explicitly defined for this HTTP_HOST value.
     *
     * @deprecated 4.0 Use the "RootURLController.default_homepage_link" config setting instead
     * @return string
     */
    static public function get_default_homepage_link() {
        Deprecation::notice('4.0', 'Use the "RootURLController.default_homepage_link" config setting instead');
        return Config::inst()->get('RootURLController', 'default_homepage_link');
    }


}