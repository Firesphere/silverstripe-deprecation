<?php

/**
 * Created by IntelliJ IDEA.
 * User: simon
 * Date: 20/03/16
 * Time: 15:30
 */

/**
 * @deprecated 3.2..4.0
 */
class SideReport_BrokenFiles extends BrokenFilesReport
{
    public function __construct()
    {
        Deprecation::notice('4.0', 'Use BrokenFilesReport instead');
        parent::__construct();
    }
}


/**
 * @deprecated 3.2..4.0
 */
class SideReport_BrokenLinks extends BrokenLinksReport
{
    public function __construct()
    {
        Deprecation::notice('4.0', 'Use BrokenLinksReport instead');
        parent::__construct();
    }
}

/**
 * @deprecated 3.2..4.0
 */
class SideReport_BrokenRedirectorPages extends BrokenRedirectorPagesReport
{
    public function __construct()
    {
        Deprecation::notice('4.0', 'Use BrokenRedirectorPagesReport instead');
        parent::__construct();
    }
}

/**
 * @deprecated 3.2..4.0
 */
class SideReport_BrokenVirtualPages extends BrokenVirtualPagesReport
{
    public function __construct()
    {
        Deprecation::notice('4.0', 'Use BrokenVirtualPagesReport instead');
        parent::__construct();
    }
}

/**
 * @deprecated 3.2..4.0
 */
class SideReport_EmptyPages extends EmptyPagesReport
{
    public function __construct()
    {
        Deprecation::notice('4.0', 'Use EmptyPagesReport instead');
        parent::__construct();
    }
}

/**
 * @deprecated 3.2..4.0
 */
class SideReport_RecentlyEdited extends RecentlyEditedReport
{
    public function __construct()
    {
        Deprecation::notice('4.0', 'Use RecentlyEditedReport instead');
        parent::__construct();
    }
}
