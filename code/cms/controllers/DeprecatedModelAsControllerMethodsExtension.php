<?php

/**
 * Created by IntelliJ IDEA.
 * User: simon
 * Date: 20/03/16
 * Time: 15:15
 */
class DeprecatedModelAsControllerMethodsExtension extends DataExtension
{


    /**
     * @deprecated 4.0 Use OldPageRedirector::find_old_page instead
     *
     * @param string $URLSegment A subset of the url. i.e in /home/contact/ home and contact are URLSegment.
     * @param int $parent The ID of the parent of the page the URLSegment belongs to.
     * @param bool $ignoreNestedURLs
     * @return SiteTree
     */
    static public function find_old_page($URLSegment, $parent = null, $ignoreNestedURLs = false)
    {
        Deprecation::notice('4.0', 'Use OldPageRedirector::find_old_page instead');
        if ($parent) {
            $parent = SiteTree::get()->byId($parent);
        }
        $url = OldPageRedirector::find_old_page(array($URLSegment), $parent);
        return SiteTree::get_by_link($url);
    }


}