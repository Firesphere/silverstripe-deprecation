<?php

/**
 * Created by IntelliJ IDEA.
 * User: simon
 * Date: 20/03/16
 * Time: 15:19
 */
class DeprecatedSiteTreeMethodsExtension extends DataExtension
{


    /**
     * Determines if the system should avoid orphaned pages
     * by deleting all children when the their parent is deleted (TRUE),
     * or rather preserve this data even if its not reachable through any navigation path (FALSE).
     *
     * @deprecated 4.0 Use the "SiteTree.enforce_strict_hierarchy" config setting instead
     * @param boolean
     */
    static public function set_enforce_strict_hierarchy($to) {
        Deprecation::notice('4.0', 'Use the "SiteTree.enforce_strict_hierarchy" config setting instead');
        Config::inst()->update('SiteTree', 'enforce_strict_hierarchy', $to);
    }

    /**
     * @deprecated 4.0 Use the "SiteTree.enforce_strict_hierarchy" config setting instead
     * @return boolean
     */
    static public function get_enforce_strict_hierarchy() {
        Deprecation::notice('4.0', 'Use the "SiteTree.enforce_strict_hierarchy" config setting instead');
        return Config::inst()->get('SiteTree', 'enforce_strict_hierarchy');
    }

    /**
     * Returns TRUE if nested URLs (e.g. page/sub-page/) are currently enabled on this site.
     *
     * @deprecated 4.0 Use the "SiteTree.nested_urls" config setting instead
     * @return bool
     */
    static public function nested_urls() {
        Deprecation::notice('4.0', 'Use the "SiteTree.nested_urls" config setting instead');
        return Config::inst()->get('SiteTree', 'nested_urls');
    }

    /**
     * @deprecated 4.0 Use the "SiteTree.nested_urls" config setting instead
     */
    static public function enable_nested_urls() {
        Deprecation::notice('4.0', 'Use the "SiteTree.nested_urls" config setting instead');
        Config::inst()->update('SiteTree', 'nested_urls', true);
    }

    /**
     * @deprecated 4.0 Use the "SiteTree.nested_urls" config setting instead
     */
    static public function disable_nested_urls() {
        Deprecation::notice('4.0', 'Use the "SiteTree.nested_urls" config setting instead');
        Config::inst()->update('SiteTree', 'nested_urls', false);
    }

    /**
     * Set the (re)creation of default pages on /dev/build
     *
     * @deprecated 4.0 Use the "SiteTree.create_default_pages" config setting instead
     * @param bool $option
     */
    static public function set_create_default_pages($option = true) {
        Deprecation::notice('4.0', 'Use the "SiteTree.create_default_pages" config setting instead');
        Config::inst()->update('SiteTree', 'create_default_pages', $option);
    }

    /**
     * Return true if default pages should be created on /dev/build.
     *
     * @deprecated 4.0 Use the "SiteTree.create_default_pages" config setting instead
     * @return bool
     */
    static public function get_create_default_pages() {
        Deprecation::notice('4.0', 'Use the "SiteTree.create_default_pages" config setting instead');
        return Config::inst()->get('SiteTree', 'create_default_pages');
    }

}